<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\RewardOperation;
use App\Models\PartnerOperation;
use Illuminate\Http\Request;

class PartnerOperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $operation_count = PartnerOperation::all()->count();
        $operation_list= PartnerOperation::orderBy('id', 'desc')->paginate(20);

        return view('admin.home.index', [
            'operation_list' => $operation_list,
            'operation_count' => $operation_count
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $operation_type_list = RewardOperation::all()->toArray();
        return view('admin.partner_operation.create', [
            'operation_type_list' => $operation_type_list
        ]);
    }


    // Добавить действие (операцию) конкретному пользователю
    public function action($partner_id)
    {

        $p = Partner::find($partner_id);
        $operation_type_list = RewardOperation::all()->toArray();
        return view('admin.partner_operation.create', [
            'operation_type_list' => $operation_type_list,
            'partner' => $p
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
        
        $new_action = new PartnerOperation();
        $new_action->reward_operations_id = $request->reward_operations_id;
        $new_action->partner_id = $request->partner_id;
        $new_action->reward_total = $request->reward_total;
        $new_action->save();

        $p = Partner::find($request->partner_id);
        $reward_total_cur = $p->reward_total;

        $r = RewardOperation::find($request->reward_operations_id);
        $reward_operation_type = $r->type;

        // если - приход
        if($r->type == 1) {
            $p->reward_total = floatval($reward_total_cur) + floatval($request->reward_total); 
            $p->save();
        }

        if($r->type == 2) {

            if(floatval($reward_total_cur) <= floatval($request->reward_total)) {
                $p->reward_total = 0;
                $p->save();
            } else {
                $p->reward_total = floatval($reward_total_cur) - floatval($request->reward_total);
                $p->save();
            }

            /*if($reward_total_cur <= 0) {

            }*/
        }

        return redirect()->back()->withSuccess('Операция добавлена'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
