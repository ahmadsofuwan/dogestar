<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helper\Help;
use App\Models\UserPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerDashboard extends Controller
{
    //claim 15 hari sekali
    //peningkatan network boost 10%
    public $claimLimitDays = 15;
    public $claimMaxNetworkMaching = 10000;
    public $claimMaxBoostkMaching = 110;
    public $claimFeeBoostkMaching = 10;
    public $claimMaxDoge = 2000;
    public $claimGasFee  = 0.1; //untuk token potong doge
    public $claimGasFeeDoge  = 100; //doge


    public function getClaimUp()
    {
        return $this->claimMaxDoge * 0.1;
    }


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
            'claimMaxNetworkMaching' => $this->claimMaxNetworkMaching,
            'maxClaimDoge' => $this->claimMaxDoge,
            'claimMaxBoostkMaching' => $this->claimMaxBoostkMaching,

        ];

        return view('customer.dashboard', $data);
    }



    public function claimNetworkBoost(Request $request)
    {
        $user = auth()->user()->load('networks');
        $network = $user->networks;
        $gasFee = 10;

        $password = $request->input('password');
        if (!Hash::check($password, $user->password)) {
            return response()->json(['success' => false, 'message' => 'Incorrect password.']);
        }

        if ($network->date_network_boost > now()) {
            return response()->json(['success' => false, 'message' => "The time to claim hasn't arrived yet, claim in " . Carbon::parse($network->date_network_boost)->format('Y-m-d H:i')]);
        }

        if ($user->doge < $gasFee) {
            return response()->json(['success' => false, 'message' => 'You do not have enough Doge to claim.']);
        }

        if ($network->network_boost <= 0) {
            return response()->json(['success' => false, 'message' => 'You have no network boost to claim.']);
        }
        //gas fee 
        $user->doge -= $gasFee;
        $user->doge += $network->network_boost;
        $user->save();

        if ($network->network_boost < $network->network_boost_limit) {
            $network->network_boost = 0;
        } else {
            $network->network_boost -= $network->network_boost_limit;
        }
        $network->date_network_boost = now()->addDays($this->claimLimitDays);
        $network->network_boost_limit += $this->claimUp;
        $network->save();
        return response()->json(['success' => true, 'message' => 'Network boost has been increased.']);
    }
    public function claimNetworkMatching(Request $request)
    {
        $user = auth()->user()->load('networks');
        $network = $user->networks;
        $gasFee = 10;

        $password = $request->input('password');
        if (!Hash::check($password, $user->password)) {
            return response()->json(['success' => false, 'message' => 'Incorrect password.']);
        }

        if ($network->date_network_matching > now()) {
            return response()->json(['success' => false, 'message' => "The time to claim hasn't arrived yet, claim in " . Carbon::parse($network->date_network_matching)->format('Y-m-d H:i')]);
        }

        if ($user->doge < $gasFee) {
            return response()->json(['success' => false, 'message' => 'You do not have enough Doge to claim.']);
        }

        if ($network->network_matching <= 0) {
            return response()->json(['success' => false, 'message' => 'You have no network matching to claim.']);
        }
        //gas fee 
        $user->doge -= $gasFee;
        $user->saldo += $network->network_matching;
        $user->save();

        if ($network->network_matching < $network->network_matching_limit) {
            $network->network_matching = 0;
        } else {
            $network->network_matching -= $network->network_matching_limit;
        }
        $network->date_network_matching = now()->addDays($this->claimLimitDays);
        $network->network_boost_limit += $this->claimUp;
        $network->save();
        return response()->json(['success' => true, 'message' => 'Network boost has been increased.']);
    }
    public function claimBoostMatching(Request $request)
    {
        $user = auth()->user()->load('networks');
        $network = $user->networks;
        $gasFee = 10;

        $password = $request->input('password');
        if (!Hash::check($password, $user->password)) {
            return response()->json(['success' => false, 'message' => 'Incorrect password.']);
        }

        if ($network->date_boost_matching > now()) {
            return response()->json(['success' => false, 'message' => "The time to claim hasn't arrived yet, claim in " . Carbon::parse($network->date_network_matching)->format('Y-m-d H:i')]);
        }

        if ($user->doge < $gasFee) {
            return response()->json(['success' => false, 'message' => 'You do not have enough Doge to claim.']);
        }

        if ($network->boost_matching <= 0) {
            return response()->json(['success' => false, 'message' => 'You have no network matching to claim.']);
        }
        //gas fee 
        $user->doge -= $gasFee;
        $user->saldo += $network->boost_matching;
        $user->save();

        if ($network->boost_matching < $network->boost_matching_limit) {
            $network->boost_matching = 0;
        } else {
            $network->boost_matching -= $network->boost_matching_limit;
        }
        $network->date_boost_matching = now()->addDays($this->claimLimitDays);
        $network->boost_matching_limit += $this->claimUp;
        $network->save();
        return response()->json(['success' => true, 'message' => 'Network boost has been increased.']);
    }
    public function claimStaking(Request $request)
    {
        if (!Hash::check($request->password, Auth::user()->password)) {
            return response()->json(['error' => 'wrong password']);
        }
        $user = Auth::user();
        $stakingToken = $user->staking_token;
        $maxClaim = 99999999999999999999;
        $feeClaim = 0.1;


        if ($user->doge < $feeClaim) {
            return response()->json(['success' => false, 'message' => 'doge less than ' . number_format($feeClaim)]);
        } else if ($stakingToken > $maxClaim) {
            $user->staking_token -= $maxClaim; // kurangi token yang terkumpul
            $user->saldo += $maxClaim;
            $user->doge -= $feeClaim;
            $user->save(); // simpan perubahan

            //logs claim token 
            $log = new Log();
            $log->reff = $user->id;
            $log->target = $user->id;
            $log->value = "-" .  $feeClaim;
            $log->note = "Doge: Claim Token " . number_format($feeClaim);
            $log->save();


            return response()->json(['success' => true, 'message' => 'Claimed max tokens ' . number_format($maxClaim), 'remaining_staking_token' => $user->staking_token]);
        } else if ($stakingToken == 0) {
            return response()->json(['success' => false, 'message' => 'Empty token']);
        } else { // $stakingToken < $maxClaim
            $user->saldo += $stakingToken; // tambahkan sisa token ke saldo
            $user->staking_token = 0; // kurangi semua token yang tersisa
            $user->doge -= $feeClaim;
            $user->save(); // simpan perubahan
            return response()->json(['success' => true, 'message' => 'Claimed all available tokens ' . number_format($stakingToken), 'remaining_staking_token' => $user->staking_token]);
        }
    }
}
