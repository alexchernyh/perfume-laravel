<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;

class OrdersPartnerController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $partner = Partner::where('user_id', $user_id)->first();

        $list_count = Order::where('partner_id', $partner->id)->count();
        $list = Order::where('partner_id', $partner->id)->orderBy('id', 'desc')->paginate(10);
        
        return view('partners_order.index', [
            'partner' => $partner,
            'list_count' => $list_count,
            'list' => $list
        ]);
    }
}
