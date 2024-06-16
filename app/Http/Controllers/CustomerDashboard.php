<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helper\Help;
use App\Models\UserPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerDashboard extends Controller
{
    public function index()
    {
        $user = auth()->user()->load('networks');
        $userPackageSummary = UserPackage::where('user_id', $user->id)
            ->where('status', 'active')
            ->selectRaw('SUM(profit_per_hours) as totalProfitPerHours, SUM(max_claim) as totalMaxClaim')
            ->first();

        if (!empty($userPackageSummary)) {
            $perscon = $userPackageSummary->totalProfitPerHours / 3600;
            $totalHours = $userPackageSummary->totalMaxClaim / 60;
        }


        $data = [
            'nav' => 'dashboard',
            'user' => $user,
            'perscon' => $perscon,
            'totalHours' => $totalHours,

        ];

        return view('customer.dashboard', $data);
    }
}
