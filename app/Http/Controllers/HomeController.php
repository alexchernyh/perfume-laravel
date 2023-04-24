<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainpageBlock;
use App\Models\Option;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $options = Option::all()->toArray();

        $arr = [];
        foreach ($options as $option) {
            $arr[$option['option_name']] = $option['option_value'];
        }

        $list = MainpageBlock::all()->toArray();

        $intro = $list[0];
        $intro['list'] = json_decode($intro['content'], true);

        $projects = $list[1];
        $projects['list'] = json_decode($projects['content'], true);

        $features = $list[2];
        $features['list'] = json_decode($features['content'], true);

        $faq = $list[3];
        $faq['list'] = json_decode($faq['content'], true);
        
        return view('index', [
            'list' => $list,
            'faq' =>  $faq,
            'intro' => $intro,
            'projects' => $projects,
            'features' => $features,
            'site_info' => $arr
        ]);
    }
}
