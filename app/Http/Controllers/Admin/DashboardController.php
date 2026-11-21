<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ItemReport;
use App\Models\Claim;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::where('role', 'user')->count();

        $totalReports = ItemReport::count();

        $totalLost = ItemReport::where('type', 'lost')->count();

        $totalFound = ItemReport::where('type', 'found')->count();

        $activeReports = ItemReport::where('status', 'active')->count();

        $claimedReports = ItemReport::where('status', 'claimed')->count();

        $returnedReports = ItemReport::where('status', 'returned')->count();

        $visibleReports = ItemReport::where('moderation_status', 'visible')->count();

        $hiddenReports = ItemReport::where('moderation_status', 'hidden')->count();

        $totalClaims = Claim::count();

        $pendingClaims = Claim::where('status', 'pending')->count();

        $approvedClaims = Claim::where('status', 'approved')->count();

        $rejectedClaims = Claim::where('status', 'rejected')->count();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalReports',
            'totalLost',
            'totalFound',
            'activeReports',
            'claimedReports',
            'returnedReports',
            'visibleReports',
            'hiddenReports',
            'totalClaims',
            'pendingClaims',
            'approvedClaims',
            'rejectedClaims'
        ));
    }
}
