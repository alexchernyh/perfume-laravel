<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Hash;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $partners_list = Partner::orderBy('id', 'desc')->get();

        return view('admin.partner.index', [
            'partners' => $partners_list
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // создание пользователя в системе ларавел
        $user = User::create([
            'name' => $request->email,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('user');

        // добавление партнера
        $new_partner = new Partner();
        $new_partner->first_name = $request->first_name;
        $new_partner->mid_name = $request->mid_name;
        $new_partner->last_name = $request->last_name;
        $new_partner->phone = $request->phone;
        $new_partner->email = $request->email;
        $new_partner->user_id = $user->id; //TODO: здесь вставить id из user
        $new_partner->invited_id = $request->invited_id;
        $new_partner->reward_total = $request->reward_total;
        $new_partner->orders_total = $request->orders_total;
        $new_partner->save();

        return redirect()->back()->withSuccess('Новый партнер добавлен');

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
