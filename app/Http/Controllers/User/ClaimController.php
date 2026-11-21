<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use App\Models\ItemReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClaimController extends Controller
{
    public function store(Request $request, ItemReport $report)
    {
        abort_if(
            $report->type !== 'found' ||
            $report->status !== 'active' ||
            $report->moderation_status !== 'visible',
            404
        );

        abort_if($report->user_id === auth()->id(), 403);

        $validated = $request->validate([
            'reason' => ['required', 'string', 'min:20', 'max:2000'],
        ], [
            'reason.required' => 'Alasan klaim wajib diisi.',
            'reason.min' => 'Jelaskan bukti kepemilikan minimal 20 karakter.',
            'reason.max' => 'Alasan klaim maksimal 2000 karakter.',
        ]);

        $existingClaim = Claim::where('item_report_id', $report->id)
            ->where('claimant_id', auth()->id())
            ->exists();

        if ($existingClaim) {
            return back()->with('error', 'Kamu sudah pernah mengajukan klaim untuk laporan ini.');
        }

        Claim::create([
            'item_report_id' => $report->id,
            'claimant_id' => auth()->id(),
            'reason' => $validated['reason'],
        ]);

        return redirect()
            ->route('user.dashboard')
            ->with('success', 'Pengajuan klaim berhasil dikirim. Silakan tunggu konfirmasi dari penemu barang.');
    }

    public function index(ItemReport $report)
    {
        abort_unless($report->user_id === auth()->id(), 403);
        abort_if($report->type !== 'found', 404);

        $claims = $report->claims()
            ->with('claimant')
            ->latest()
            ->get();

        return view('user.claims.index', compact('report', 'claims'));
    }

    public function myClaims()
    {
        $claims = Claim::with('itemReport.user')
            ->where('claimant_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('user.claims.my', compact('claims'));
    }

    public function approve(ItemReport $report, Claim $claim)
    {
        abort_unless($report->user_id === auth()->id(), 403);
        abort_unless($claim->item_report_id === $report->id, 404);

        $result = DB::transaction(function () use ($report, $claim) {
            $lockedReport = ItemReport::whereKey($report->id)
                ->lockForUpdate()
                ->firstOrFail();

            $lockedClaim = Claim::whereKey($claim->id)
                ->lockForUpdate()
                ->firstOrFail();

            if (
                $lockedReport->type !== 'found' ||
                $lockedReport->status !== 'active' ||
                $lockedReport->moderation_status !== 'visible' ||
                $lockedClaim->status !== 'pending'
            ) {
                return false;
            }

            $lockedClaim->forceFill([
                'status' => 'approved',
                'responded_at' => now(),
            ])->save();

            $lockedReport->forceFill([
                'status' => 'claimed',
            ])->save();

            Claim::where('item_report_id', $lockedReport->id)
                ->where('id', '!=', $lockedClaim->id)
                ->where('status', 'pending')
                ->update([
                    'status' => 'rejected',
                    'responded_at' => now(),
                ]);

            return true;
        });

        if (!$result) {
            return back()->with('error', 'Klaim tidak dapat disetujui karena sudah diproses atau laporan tidak lagi aktif.');
        }

        return back()->with('success', 'Klaim berhasil disetujui.');
    }

    public function reject(ItemReport $report, Claim $claim)
    {
        abort_unless($report->user_id === auth()->id(), 403);
        abort_unless($claim->item_report_id === $report->id, 404);

        $result = DB::transaction(function () use ($report, $claim) {
            $lockedReport = ItemReport::whereKey($report->id)
                ->lockForUpdate()
                ->firstOrFail();

            $lockedClaim = Claim::whereKey($claim->id)
                ->lockForUpdate()
                ->firstOrFail();

            if (
                $lockedReport->status !== 'active' ||
                $lockedClaim->status !== 'pending'
            ) {
                return false;
            }

            $lockedClaim->forceFill([
                'status' => 'rejected',
                'responded_at' => now(),
            ])->save();

            return true;
        });

        if (!$result) {
            return back()->with('error', 'Klaim tidak dapat ditolak karena sudah diproses atau laporan tidak lagi aktif.');
        }

        return back()->with('success', 'Pengajuan klaim berhasil ditolak.');
    }

    public function requestContact(ItemReport $report, Claim $claim)
    {
        abort_unless($claim->item_report_id === $report->id, 404);
        abort_unless($claim->claimant_id === auth()->id(), 403);

        $result = DB::transaction(function () use ($report, $claim) {
            $lockedReport = ItemReport::whereKey($report->id)
                ->lockForUpdate()
                ->firstOrFail();

            $lockedClaim = Claim::whereKey($claim->id)
                ->lockForUpdate()
                ->firstOrFail();

            if (
                $lockedClaim->status !== 'approved' ||
                $lockedReport->status !== 'claimed' ||
                $lockedClaim->contact_status !== 'not_requested'
            ) {
                return false;
            }

            $lockedClaim->forceFill([
                'contact_status' => 'pending',
                'contact_responded_at' => null,
            ])->save();

            return true;
        });

        if (!$result) {
            return back()->with('error', 'Permintaan kontak tidak dapat dikirim atau sudah pernah diajukan.');
        }

        return back()->with('success', 'Permintaan kontak berhasil dikirim. Silakan tunggu persetujuan penemu.');
    }

    public function approveContact(ItemReport $report, Claim $claim)
    {
        abort_unless($claim->item_report_id === $report->id, 404);
        abort_unless($report->user_id === auth()->id(), 403);

        $result = DB::transaction(function () use ($report, $claim) {
            $lockedReport = ItemReport::whereKey($report->id)
                ->lockForUpdate()
                ->firstOrFail();

            $lockedClaim = Claim::whereKey($claim->id)
                ->lockForUpdate()
                ->firstOrFail();

            if (
                $lockedClaim->status !== 'approved' ||
                $lockedReport->status !== 'claimed' ||
                $lockedClaim->contact_status !== 'pending'
            ) {
                return false;
            }

            $lockedClaim->forceFill([
                'contact_status' => 'approved',
                'contact_responded_at' => now(),
            ])->save();

            return true;
        });

        if (!$result) {
            return back()->with('error', 'Permintaan kontak tidak dapat disetujui.');
        }

        return back()->with('success', 'Permintaan kontak berhasil disetujui.');
    }

    public function rejectContact(ItemReport $report, Claim $claim)
    {
        abort_unless($claim->item_report_id === $report->id, 404);
        abort_unless($report->user_id === auth()->id(), 403);

        $result = DB::transaction(function () use ($report, $claim) {
            $lockedReport = ItemReport::whereKey($report->id)
                ->lockForUpdate()
                ->firstOrFail();

            $lockedClaim = Claim::whereKey($claim->id)
                ->lockForUpdate()
                ->firstOrFail();

            if (
                $lockedClaim->status !== 'approved' ||
                $lockedReport->status !== 'claimed' ||
                $lockedClaim->contact_status !== 'pending'
            ) {
                return false;
            }

            $lockedClaim->forceFill([
                'contact_status' => 'rejected',
                'contact_responded_at' => now(),
            ])->save();

            return true;
        });

        if (!$result) {
            return back()->with('error', 'Permintaan kontak tidak dapat ditolak.');
        }

        return back()->with('success', 'Permintaan kontak berhasil ditolak.');
    }

    public function confirmHandoff(ItemReport $report, Claim $claim)
    {
        abort_unless($claim->item_report_id === $report->id, 404);

        $userId = auth()->id();

        $result = DB::transaction(function () use ($report, $claim, $userId) {
            $lockedReport = ItemReport::whereKey($report->id)
                ->lockForUpdate()
                ->firstOrFail();

            $lockedClaim = Claim::whereKey($claim->id)
                ->lockForUpdate()
                ->firstOrFail();

            if (
                $lockedReport->status !== 'claimed' ||
                $lockedClaim->status !== 'approved'
            ) {
                return 'invalid';
            }

            if ($lockedReport->user_id === $userId) {
                if ($lockedClaim->finder_confirmed_at !== null) {
                    return 'already_confirmed';
                }

                $lockedClaim->forceFill([
                    'finder_confirmed_at' => now(),
                ])->save();
            } elseif ($lockedClaim->claimant_id === $userId) {
                if ($lockedClaim->claimant_confirmed_at !== null) {
                    return 'already_confirmed';
                }

                $lockedClaim->forceFill([
                    'claimant_confirmed_at' => now(),
                ])->save();
            } else {
                return 'unauthorized';
            }

            if (
                $lockedClaim->finder_confirmed_at !== null &&
                $lockedClaim->claimant_confirmed_at !== null
            ) {
                $lockedReport->forceFill([
                    'status' => 'returned',
                ])->save();
            }

            return 'success';
        });

        if ($result === 'unauthorized') {
            abort(403, 'Anda tidak memiliki akses untuk mengonfirmasi serah terima ini.');
        }

        if ($result === 'invalid') {
            return back()->with('error', 'Serah terima belum dapat dikonfirmasi.');
        }

        if ($result === 'already_confirmed') {
            return back()->with('error', 'Anda sudah mengonfirmasi serah terima ini.');
        }

        return back()->with(
            'success',
            'Konfirmasi berhasil disimpan. Status barang akan menjadi returned setelah kedua pihak mengonfirmasi.'
        );
    }

    public function handoff(ItemReport $report, Claim $claim)
    {
        abort_unless($claim->item_report_id === $report->id, 404);

        abort_unless(
            $report->user_id === auth()->id() ||
            $claim->claimant_id === auth()->id(),
            403
        );

        abort_unless($claim->status === 'approved', 404);

        $claim->load('claimant', 'itemReport.user');

        return view('user.claims.handoff', compact('report', 'claim'));
    }
}
