<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\User;
use App\Models\PartnerCategory;
use App\Models\PartnerToCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Input;
// use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $partners_cat_list = PartnerCategory::all()->toArray();
        $partners_count = Partner::all()->count();
        $partners_list = Partner::orderBy('id', 'desc')->paginate(10);

        return view('admin.partner.index', [
            'partners' => $partners_list,
            'partners_count' => $partners_count,
            'cat_list' => $partners_cat_list
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partners_cat_list = PartnerCategory::all()->toArray();
        return view('admin.partner.create', [
            'cat_list' => $partners_cat_list
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

        $rules = array(
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'required',
            'email'      => 'required|email',
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(); // TODO добавить очистку поля пароль
// 
        } else {
          // создание пользователя в системе ларавел
            $user = User::create([
                'name' => $request->email,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->assignRole('user');

            $reward_total = str_replace(",", ".", $request->reward_total);
            $reward_total = floatval($reward_total);

            $expected_reward_total = str_replace(",", ".", $request->expected_reward_total);
            $expected_reward_total = floatval($expected_reward_total);

            $orders_total = str_replace(",", ".", $request->orders_total);
            $orders_total = floatval($orders_total);

            $group_orders_total = str_replace(",", ".", $request->group_orders_total);
            $group_orders_total = floatval($group_orders_total);    

            $group_orders_total_all_time = str_replace(",", ".", $request->group_orders_total_all_time);
            $group_orders_total_all_time = floatval($group_orders_total_all_time);   

            // добавление партнера
            $new_partner = new Partner();
            $new_partner->first_name = $request->first_name;
            $new_partner->mid_name = $request->mid_name;
            $new_partner->last_name = $request->last_name;
            $new_partner->phone = $request->phone;
            $new_partner->email = $request->email;
            $new_partner->user_id = $user->id; //TODO: здесь вставить id из user
            $new_partner->partner_categories_id = $request->partner_categories_id; //TODO: здесь вставить id из user
            $new_partner->invited_id = $request->invited_id;
            $new_partner->city = $request->city;
            $new_partner->project1_category = $request->project1_category;
            $new_partner->project2_category = $request->project2_category;
            $new_partner->reward_total = $reward_total;
            $new_partner->expected_reward_total = $expected_reward_total;
            $new_partner->orders_total = $orders_total;
            $new_partner->group_orders_total = $group_orders_total;
            $new_partner->group_orders_total_all_time = $group_orders_total_all_time;
            $new_partner->save();

            return redirect()->back()->withSuccess('Новый партнер добавлен');  
        }

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
        $cat_list = PartnerCategory::all()->toArray();
        // $bioniks_list = PartnerToCategory::where('shop_id', $id)->toArray();
        $p = Partner::find($id);
        return view('admin.partner.edit', [
            'partner' => $p,
            'cat_list' => $cat_list
            // 'partners_cat_list' => $partners_cat_list,
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
        
        $partner = Partner::find($id);

        // Обновление таблицы пользователя
        // произошла смена пароля
        if($request->password) {
            $user = User::find($partner->user_id);
            $user->password = Hash::make($request->password);
            $user->save();
        }

        // произошла смена почты
        if($request->email !== $partner->email ) {
            $user = User::find($partner->user_id);

            $user->email = $request->email;
            $user->name = $request->email;
            $user->save();
        }

        // Обновление таблицы партнеры

        $reward_total = str_replace(",", ".", $request->reward_total);
        $reward_total = floatval($reward_total);

        $expected_reward_total = str_replace(",", ".", $request->expected_reward_total);
        $expected_reward_total = floatval($expected_reward_total);

        $orders_total = str_replace(",", ".", $request->orders_total);
        $orders_total = floatval($orders_total);

        $group_orders_total = str_replace(",", ".", $request->group_orders_total);
        $group_orders_total = floatval($group_orders_total);    

        $group_orders_total_all_time = str_replace(",", ".", $request->group_orders_total_all_time);
        $group_orders_total_all_time = floatval($group_orders_total_all_time);      

        $partner->first_name = $request->first_name;
        $partner->mid_name = $request->mid_name;
        $partner->last_name = $request->last_name;
        $partner->phone = $request->phone;
        $partner->email = $request->email;
        $partner->city = $request->city;
        $partner->partner_categories_id = $request->partner_categories_id; //TODO: здесь вставить id из user
        $partner->project1_category = $request->project1_category;
        $partner->project2_category = $request->project2_category;
        $partner->invited_id = $request->invited_id;
        $partner->reward_total = $reward_total;
        $partner->expected_reward_total = $expected_reward_total;
        $partner->orders_total = $orders_total;
        $partner->group_orders_total = $group_orders_total;
        $partner->group_orders_total_all_time = $group_orders_total_all_time;
        $partner->save();

        return redirect()->back()->withSuccess('Партнер успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Partner::find($id);
        $u_id = $p->user_id;
        $p->delete();

        $u = User::find($u_id);
        $u->delete();

        return redirect()->back()->withSuccess('Партнер был успешно удален');

    }
}
