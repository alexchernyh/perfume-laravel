<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;

class HomeController extends Controller
{
    public function index() {

        $partner_count = Partner::all()->count();

        return view('admin.home.index', [
            'partner_count' => $partner_count
        ]);
    }
}
