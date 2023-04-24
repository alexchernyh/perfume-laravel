<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomePartnerController extends Controller
{
    
    public $start_day = 3;  
    public $last_day = 28;  

    public function index()
    {
        $user_id = Auth::user()->id;
        $partner = Partner::where('user_id', $user_id)->first();
        $partner_operations = $partner->partner_operation()->paginate(10);

        // сумма полученных баллов за все время
        $partner_total_reward = DB::table('partner_operations')
                ->where('partner_id', $partner->id)
                ->sum('reward_total');

        return view('partners.index', [
            'partner' => $partner,
            'partner_operations' => $partner_operations,
            'partner_total_reward' => $partner_total_reward,
            'reward_payment_date' => $this->getNextRewardDay()
        ]);
    }


    public function getNextRewardDay(){

        // 1. определяем текущую дата
        // 2. определяем дату начисления бонусов 3 число следующего месяца
        $current_day = get_time_with_UTC_offset('j','Europe/Moscow', false);
        $current_month = get_time_with_UTC_offset('m','Europe/Moscow', false);
        $current_year = get_time_with_UTC_offset('Y','Europe/Moscow', false);

        // $current_day = get_time_with_UTC_offset('d.m.Y','Europe/Moscow', false);

        $now_time = get_time_with_UTC_offset('H:i:s, d.m.Y','Europe/Moscow', false);
        $now_time_unix = strtotime($now_time);
        
        // Делаем дату перехода баллов между счетами
        $payment_day_unix = mktime(0, 0, 0, $current_month, $this->start_day, $current_year);

        if($now_time_unix < $payment_day_unix) {
            $month_start = $current_month;
        } else {
            $month_start = $current_month+1;
        }

        $billing_start_unix = mktime(0, 0, 0, $month_start, $this->start_day, $current_year); 

        return date("d.m.Y", $billing_start_unix);
    }


}
