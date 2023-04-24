<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RewardOperation;

class RewardOperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = RewardOperation::all()->count();

        $list = RewardOperation::orderBy('id', 'asc')->get();

        return view('admin.partner_reward.index', [
            'list' => $list,
            'list_count' => $count
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partner_reward.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $store = new RewardOperation;
         $store->name = $request->name;
         $store->type = $request->type;
         $store->system_name = $request->system_name;
         $store->save();

         return redirect()->back()->withSuccess('Новая операция добавлена');
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
        $item = RewardOperation::find($id);
        return view('admin.partner_reward.edit', [
            'item' => $item
        ]);
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
         $update = RewardOperation::find($id);
         $update->name = $request->name;
         $update->type = $request->type;
         $update->system_name = $request->system_name;
         $update->save();

         return redirect()->back()->withSuccess('Операция была успешно обновлена!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = RewardOperation::find($id);
        $destroy->delete();

        return redirect()->back()->withSuccess('Операция была успешно удалена');
    }
}
