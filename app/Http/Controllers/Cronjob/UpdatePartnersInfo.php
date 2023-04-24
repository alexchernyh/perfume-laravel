<?php

namespace App\Http\Controllers\Cronjob;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\RewardOperation;
use App\Models\PartnerOperation;
use App\Models\ScheduleTask;
use App\Models\PartnerCategory;
use Illuminate\Support\Facades\DB;

class UpdatePartnersInfo extends Controller
{
    // максимальный уровень группы
    public const MAX_GROUP_LEVEL = 6;
    // минимальный заказ самого партнера чтобы ему начислить бонусы 
    public const MINIMUM_MONTHLY_ORDER = 250.0;    

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 
    public function __invoke(Request $request)
    {

        // Проверка, выполнялась ли успешно задача в этом месяце
        $current_month = get_time_with_UTC_offset('m','Europe/Moscow', false);

        $crontask = DB::table('schedule_tasks')
                ->where('status', 'like', 'success')
                ->whereMonth('created_at', $current_month)
                ->first();

        // var_dump($crontask);
        // die();

        // if(!isset($crontask)) {

        if(!isset($crontask->id) || !isset($crontask)) {

            // var_dump("NULL13");
            $partners = Partner::all();
            foreach($partners as $partner) {

                // 1. Делаем перенос баллов с накопительного счета на основной платежный для всех партнеров
                // Но чтобы начислить бонусы, нужно чтобы было выполнено условие минимальный заказ ЛО = 250 руб.
                // var_dump(self::MINIMUM_MONTHLY_ORDER);
                if($partner->orders_total > self::MINIMUM_MONTHLY_ORDER) {
                    $partner->reward_total = $partner->reward_total + $partner->expected_reward_total;

                    // var_dump($partner->reward_total);

                    $log_message_type = RewardOperation::where('system_name', '=', 'transfer_reward_to_main_account')->first();
                    // Сохраняем события в журнал событий
                    // Переход бонусов на доступный для оплаты счет
                    // Добавление операции о пополнении ГО и НСО в журнал
                    if(isset($log_message_type->id) && $log_message_type->id > 0) {
                        $log_transfer_reward = new PartnerOperation();
                        $log_transfer_reward->reward_operations_id = $log_message_type->id;
                        $log_transfer_reward->partner_id = $partner->id;
                        $log_transfer_reward->reward_total = floatval($partner->reward_total);
                        $log_transfer_reward->save();
                    } 

                }
                // 2. Узнаем текущую группу партнера, пока только для BIONIKKS.RU
                // Если пользователь имеет максимальну группу, то ничего не делаем

                /*if($partner->partner_category->project2_level < self::MAX_GROUP_LEVEL 
                    && $partner->partner_category->project2_level > 0) {*/

                if($partner->partner_shop2->level < self::MAX_GROUP_LEVEL && $partner->partner_shop2->level > 0) {
                    

                    // Определение следующего уровня на который может перейти партнера
                    $next_partner_category_num = $partner->partner_category->project2_level + 1;
                    $next_partner_category = PartnerCategory::where('project2_level', $next_partner_category_num)->first();
                    
                    // Для текущей группы получаем сумму перехода на следующий уровень
                    if($next_partner_category->GO_total) {
                        // Сравнение ГО и НСО партнера и лимитов перехода на следующий уровень
                        if($partner->group_orders_total > $next_partner_category->GO_total 
                        && $partner->group_orders_total_all_time > $next_partner_category->NSO_total) {
                            $partner->partner_categories_id = $next_partner_category->id;
                        }
                    }
                }  
                // 3. Обнуляем месячный ГО, ожидаемые бонусы
                $partner->expected_reward_total = 0;
                $partner->group_orders_total = 0;
                $partner->save();
            }

            /*Добавление новой записи в журнал задач*/
            /*if($is_partner_store) {
                $cron_task_status = "success";
            } else {
                $cron_task_status = "failure";
            }*/

            $cron_task_status = "success";
            $cron_task_name = "Каждый месяц - 3е число";
            $new_cron_task = new ScheduleTask();
            $new_cron_task->name = $cron_task_name;
            $new_cron_task->status = $cron_task_status;
            $new_cron_task->description = "Начисление бонусов, обнуление ГО, смена группы";
            $new_cron_task->save();

            // return $new_cron_task;

        }
    }
}
