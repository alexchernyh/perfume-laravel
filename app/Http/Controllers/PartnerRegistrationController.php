<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Partner;
use App\Models\User;
use App\Models\Notify;
use App\Models\Page;
use App\Mail\NewPartnerNotification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PartnerRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $partners_cat_list = PartnerCategory::all()->toArray();

        // $partners_count = Partner::all()->count();

        // $partners_list = Partner::orderBy('id', 'desc')->get();
        // $partners_list = Partner::orderBy('id', 'desc')->paginate(10);

        $page = Page::where('slug', 'register_page')->firstOrFail();
        return view('partners.register', [
            'page' => $page
        ]);
        //  [
            /*'partners' => $partners_list,
            'partners_count' => $partners_count,
            'cat_list' => $partners_cat_list
        ]*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // spam check
        if ($request->newsletter){
            die();
        }

        $rules = array(
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'unique:partners|required',
            'email'      => 'required|email|unique:partners',
            'password' => 'required|string|min:8|confirmed',
            'agreement' => 'required',
            'invited_id' => 'required|exists:partners,id'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(); // TODO добавить очистку поля пароль
        } else {

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
            $new_partner->mid_name = "";
            $new_partner->last_name = $request->last_name;
            $new_partner->phone = $request->phone;
            $new_partner->email = $request->email;
            $new_partner->city = $request->city;
            $new_partner->partner_type = $request->partner_type;
            $new_partner->user_id = $user->id; //TODO: здесь вставить id из user
            $new_partner->partner_categories_id = 1; //TODO: проверять какой по умолчанию и его использовать
            $new_partner->invited_id = $request->invited_id;
            $new_partner->reward_total = 0;
            $new_partner->orders_total = 0;
            $new_partner->save();

            /*Отправка сообщения о регистрации партнера в системе */
            $admin_email_obj = Notify::where('name', 'admin_notify_email')->first();
            $admin_email_str = $admin_email_obj->value;

            $admin_emails_arr = explode(",", $admin_email_str);

            if(count($admin_emails_arr) > 1) {
               if($admin_emails_arr[0] && $admin_emails_arr[1]) {
                    $to = trim($admin_emails_arr[0]);
                    $cc = trim($admin_emails_arr[1]);

                    Mail::to($to)
                    ->cc($cc)
                    ->send(new NewPartnerNotification($new_partner));
                } 
            } elseif($admin_emails_arr[0]) {
                $to = trim($admin_emails_arr[0]);
                Mail::to($to)->send(new NewPartnerNotification($new_partner));
            }

            Auth::login($user);
            
            return redirect()->route('partner_panel');
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
