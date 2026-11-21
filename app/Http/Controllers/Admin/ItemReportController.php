<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemReport;
use Illuminate\Http\Request;

class ItemReportController extends Controller
{
    public function index(Request $request)
    {
        $query = ItemReport::with('user');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('item_name', 'like', '%' . $search . '%')
                    ->orWhere('location', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', '%' . $search . '%');
                    });
            });
        }

        if (
            $request->filled('type') &&
            in_array($request->type, ['lost', 'found'], true)
        ) {
            $query->where('type', $request->type);
        }

        if (
            $request->filled('status') &&
            in_array($request->status, ['active', 'claimed', 'returned'], true)
        ) {
            $query->where('status', $request->status);
        }

        if (
            $request->filled('moderation_status') &&
            in_array($request->moderation_status, ['visible', 'hidden'], true)
        ) {
            $query->where('moderation_status', $request->moderation_status);
        }

        $reports = $query->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.reports.index', compact('reports'));
    }

    public function show(ItemReport $report)
    {
        $report->load([
            'user',
            'moderator',
            'claims.claimant',
        ]);

        return view('admin.reports.show', compact('report'));
    }

    public function hide(Request $request, ItemReport $report)
    {
        $validated = $request->validate([
            'moderation_reason' => ['required', 'string', 'min:5', 'max:1000'],
        ]);

        $report->forceFill([
            'moderation_status' => 'hidden',
            'moderation_reason' => $validated['moderation_reason'],
            'moderated_by' => auth()->id(),
            'moderated_at' => now(),
        ])->save();

        return redirect()
            ->route('admin.reports.show', $report->id)
            ->with('success', 'Laporan berhasil disembunyikan.');
    }

    public function unhide(ItemReport $report)
    {
        $report->forceFill([
            'moderation_status' => 'visible',
            'moderation_reason' => null,
            'moderated_by' => null,
            'moderated_at' => null,
        ])->save();

        return redirect()
            ->route('admin.reports.show', $report->id)
            ->with('success', 'Laporan berhasil ditampilkan kembali.');
    }
}
