<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    /*
    *
    *  Обрабокта формы поиска партнеров на странице Партнеры в админке 
    */
    public function ajaxGetRelativePartner(Request $request) {

        if($request->search_text) {
            $users = DB::table('partners')
                    ->where('id', '=', $request->search_text)
                    ->orWhere('last_name', 'LIKE', '%'.$request->search_text.'%')
                    ->orWhere('email', 'LIKE', '%'.$request->search_text.'%')
                    ->get();    
        } else {
            $users = DB::table('partners')->get();   
        }
        


        // $sponsor_partners = Partner::where('invited_id', $request->sponsor_id)->get();

        return response()->json(['response'=>$users]);
    }
}
