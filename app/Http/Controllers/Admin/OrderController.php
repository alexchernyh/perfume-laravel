<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Shop;
use App\Models\RewardOperation;
use App\Models\PartnerOperation;
use Illuminate\Http\Request;
use App\Models\Partner;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $list_count = Order::all()->count();
        $list = Order::orderBy('id', 'desc')->paginate(10);

        return view('admin.order.index', [
            'list' => $list,
            'count' => $list_count
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_partner = Partner::all()->toArray();
        $list_shop = Shop::all()->toArray();
        return view('admin.order.create', [
            'list' => $list_partner,
            'shops' => $list_shop
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        /*var_dump($request->order_id);
        die();*/

        /*Совершивший покупку за сам заказ бонусы не получает*/
        // Добавление баллов в копилку спонсора
        $operation_rew_id = 0;
        $shops_id = 0;
        if($request->shops_id==1) {
            $operation_rew_id = 1;
            $shops_id = 1;
        } elseif($request->shops_id==2) {
            $operation_rew_id = 5;
            $shops_id = 2;
        }

        // Тип операций
        $add_to_GO_partner_id = RewardOperation::where('system_name', '=', 'partner_add_to_GO')->first();
        $add_to_reward_balance_partner_id = RewardOperation::where('system_name', '=', 'project'.$shops_id.'_reward')->first();

        // Обработка входных данных введеных пользователем
        $total_LO = str_replace(",", ".", $request->total);
        $total_LO = floatval($total_LO);

        // Увеличение суммы заказов пользователя сделавшего заказ - ЛО, увеличение ГО и НСО
        $sub_partner = Partner::find($request->sub_partner_id);
        $sub_partner->orders_total = floatval($sub_partner->orders_total) + $total_LO; 
        $sub_partner->group_orders_total = floatval($sub_partner->group_orders_total) + $total_LO;
        $sub_partner->group_orders_total_all_time = floatval($sub_partner->group_orders_total_all_time) + $total_LO; 
        $sub_partner->save();

        // Добавление операции (совершившим заказ) о пополнении ГО и НСО в журнал 
        $add_to_GO = new PartnerOperation();
        $add_to_GO->reward_operations_id = $add_to_GO_partner_id->id;
        $add_to_GO->partner_id = $request->sub_partner_id;
        $add_to_GO->reward_total = $total_LO;
        $add_to_GO->save();

        // Добавление операции о пополнении бонусного счета в журнал
        /*$add_to_reward_balance = new PartnerOperation();
        $add_to_reward_balance->reward_operations_id = $add_to_reward_balance_partner_id->id;
        $add_to_reward_balance->partner_id = $request->sub_partner_id;
        $add_to_reward_balance->reward_total = $reward_total; 
        $add_to_reward_balance->save();*/

        // Сравнение группы спосора и партнера и определение вознаграждения за заказ
        // Спонсор должен быть выше партнера
        $reward_total = 0;

        /*
        * Рекурсивный поиск всех пригласивших сделавшего заказ спонсоров
        * Строим всю цепочку рефералов
        */

        $invited_ids = []; // массив со всеми пригласившими в систему покупателя
        $invited_ids[] = $request->sub_partner_id; // строим всю цепочку рефералов, начиная с пользователя 
        
        $this->getAllPartnersIds($request->sub_partner_id, $invited_ids);

        // Строим массив с парами: sponsor (пригласивший) - partner (реферал)
        $ref_inv_arr = []; 
        for ($i=0; $i < count($invited_ids); $i++) {
            if(isset($invited_ids[$i+1])){
                $ref_inv_arr[] = array('partner'=>$invited_ids[$i], 'sponsor'=>$invited_ids[$i+1]);
            } else {
                $ref_inv_arr[] = array('partner'=>$invited_ids[$i], 'sponsor'=>0);
            }
        }


        /*var_dump($ref_inv_arr);
        die();*/

        /*Циклическое начисление всем пригласившим ГО в месячный баланс*/
        foreach ($ref_inv_arr as $key => $ref_pair) {
            
            // Нет спонсора или партнера, выход из цикла
            if(empty($ref_pair['sponsor'] || empty($ref_pair['partner']))) {
                continue;
            }

            $sponsor = Partner::find($ref_pair['sponsor']);
            
            $partner = Partner::find($ref_pair['partner']);

            /*var_dump($sponsor->{'partner_shop'.$shops_id}->level);
            var_dump($partner->{'partner_shop'.$shops_id}->level);
            die();*/

            if(!isset($sponsor->{'partner_shop'.$shops_id}->level) || !isset($partner->{'partner_shop'.$shops_id}->level)) {
                continue;
            }

            // Группа спонсора выше группы партнера
            if($sponsor->{'partner_shop'.$shops_id}->level > $partner->{'partner_shop'.$shops_id}->level) {
                
                // Высчитываем бонусы - как разница процентов между уровнями и заносим их на счет
                $sponsor_reward_delta = floatval($sponsor->{'partner_shop'.$shops_id}->category_discount) - floatval($partner->{'partner_shop'.$shops_id}->category_discount);

                $reward_total = round(($total_LO * $sponsor_reward_delta)/100.0);

                /*var_dump($sponsor_reward_delta);
                var_dump($reward_total);
                die();*/

                //Зачисялем в ГО сумму заказа
                $sponsor->group_orders_total = floatval($sponsor->group_orders_total) + $total_LO; 
                $sponsor->group_orders_total_all_time = floatval($sponsor->group_orders_total_all_time) + $total_LO; 
                $sponsor->expected_reward_total = floatval($sponsor->expected_reward_total) + $reward_total;
                $sponsor->save();

                // Добавление операции о пополнении ГО и НСО в журнал
                $add_to_GO = new PartnerOperation();
                $add_to_GO->reward_operations_id = $add_to_GO_partner_id->id;
                $add_to_GO->partner_id = $sponsor->id;
                $add_to_GO->reward_total = $total_LO;
                $add_to_GO->save();

                // Добавление операции о пополнении бонусного счета в журнал
                $add_to_reward_balance = new PartnerOperation();
                $add_to_reward_balance->reward_operations_id = $add_to_reward_balance_partner_id->id;
                $add_to_reward_balance->partner_id = $sponsor->id;
                $add_to_reward_balance->reward_total = $reward_total; 
                $add_to_reward_balance->save();
            }
        }

        // добавление заказа
        $new = new Order();
        $new->sub_partner_id = $request->sub_partner_id;
        $new->total = $total_LO;
        $new->shops_id = $request->shops_id;
        $new->order_id = $request->order_id;
        $new->save();

        return redirect()->back()->withSuccess('Новый заказ добавлен');
    }

    // Построить массив связанных партнеров 

    public function getAllPartnersIds($sub_partner_id, &$invited_ids) {
        $partner_obj = Partner::find($sub_partner_id);
        
        if (isset($partner_obj->invited_id)) {
            /*echo ("true");
            die(); */
            $invited_ids[] = $partner_obj->invited_id;
            $this->getAllPartnersIds($partner_obj->invited_id, $invited_ids);
        } else {
            return $invited_ids;
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

}
