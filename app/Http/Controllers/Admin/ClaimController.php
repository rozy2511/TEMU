<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function index(Request $request)
    {
        $query = Claim::with([
            'itemReport.user',
            'claimant',
        ]);

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->whereHas('itemReport', function ($reportQuery) use ($search) {
                    $reportQuery->where('item_name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('claimant', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('itemReport.user', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'like', '%' . $search . '%');
                });
            });
        }

        if ($request->filled('status') && in_array($request->status, [
            'pending',
            'approved',
            'rejected',
        ])) {
            $query->where('status', $request->status);
        }

        $claims = $query->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.claims.index', compact('claims'));
    }

    public function show(Claim $claim)
    {
        $claim->load([
            'itemReport.user',
            'claimant',
        ]);

        return view('admin.claims.show', compact('claim'));
    }
}
