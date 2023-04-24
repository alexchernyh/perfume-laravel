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
        
        if($request->partner_id == $request->sub_partner_id) {
            return redirect()->back()
                    ->withErrors([
                      'bad_connection' => "ID пользователей должны быть разными"
                    ])->withInput();
        }

        // Добавление баллов в копилку спонсора
        $operation_rew_id = 0;
        if($request->shops_id==1) {
            $operation_rew_id = 1;
        } elseif($request->shops_id==2) {
            $operation_rew_id = 5;
        }

        // Увеличение баланса бонусов спонсора, увеличение ГО и НСО
        $partner = Partner::find($request->partner_id);
        $partner->reward_total = floatval($partner->reward_total) + floatval($request->reward); 
        $partner->group_orders_total = floatval($partner->group_orders_total) + floatval($request->total); 
        $partner->group_orders_total_all_time = floatval($partner->group_orders_total_all_time) + floatval($request->total); 
        $partner->save();

        // Увеличение суммы заказов пользователя сделавшего заказ - ЛО, увеличение ГО и НСО
        $sub_partner = Partner::find($request->sub_partner_id);
        $sub_partner->orders_total = floatval($sub_partner->orders_total) + floatval($request->total); 
        $sub_partner->group_orders_total = floatval($sub_partner->group_orders_total) + floatval($request->total); 
        $sub_partner->group_orders_total_all_time = floatval($sub_partner->group_orders_total_all_time) + floatval($request->total); 
        $sub_partner->save();

        // Добавление операции в журнал
        $new_action = new PartnerOperation();
        $new_action->reward_operations_id = $operation_rew_id;
        $new_action->partner_id = $request->partner_id;
        $new_action->reward_total = $request->reward;
        $new_action->save();

        // добавление заказа
        $new = new Order();
        $new->partner_id = $request->partner_id;
        $new->sub_partner_id = $request->sub_partner_id;
        $new->total = $request->total;
        $new->reward = $request->reward;
        $new->shops_id = $request->shops_id;
        $new->order_id = $request->order_id;
        $new->save();

        return redirect()->back()->withSuccess('Новый заказ добавлен');
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
