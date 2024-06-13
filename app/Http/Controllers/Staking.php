<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Logstaking;
use App\Models\Reward;
use App\Models\User;
use App\Models\UserPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Staking extends Controller
{
    function stake()
    {
        $userPackage = UserPackage::where('claim_time', '<', now())
            ->where('status', 'active')
            ->with('user')
            ->limit(10)
            ->get();
        foreach ($userPackage as $key => $value) {


            $subUserPackage = UserPackage::find($value->id);
            if ($value->claimed >= $value->max_claim) { //chek jika sudah max 
                $subUserPackage->status = 'nonactive';
                $subUserPackage->save();
                continue;
            }
            $subUserPackage->user->staking_token += $subUserPackage->profit_per_hours;
            $subUserPackage->user->save();
            $subUserPackage->claimed += 1;
            $subUserPackage->claim_time = Carbon::parse($subUserPackage->claim_time)->addHour();
            $subUserPackage->save();

            //logs Staking
            $log = new Logstaking;
            $log->reff = $subUserPackage->user->id;
            $log->target = $subUserPackage->user->id;
            $log->value = "+" .  $subUserPackage->profit_per_hours;
            $log->note = "Staking " . number_format($subUserPackage->profit_per_hours);
            $log->save();



            $tempUpline = $subUserPackage->user->upline;
            for ($i = 0; $i < 3; $i++) {
                if (!empty($tempUpline)) {
                    $uplineUser = User::find($tempUpline);
                    $uplineUser->bonus += $subUserPackage->profit_per_hours;
                    $uplineUser->save();
                    $tempUpline = $uplineUser->upline;

                    //logs bonus staking group
                    $log = new Log;
                    $log->reff = $uplineUser->id;
                    $log->target = $subUserPackage->user->id;
                    $log->value = "+" .  $subUserPackage->profit_per_hours;
                    $log->note = "Bonus Group " . number_format($subUserPackage->profit_per_hours);
                    $log->save();
                } else {
                    break;
                }
            }
        }
        return response()->json(['staking' => count($userPackage)]);
    }
}
