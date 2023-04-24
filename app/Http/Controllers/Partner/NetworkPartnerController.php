<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NetworkPartnerController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $partner = Partner::where('user_id', $user_id)->first();
        $partners = Partner::all(); 

        /*массив с парами партнер-пригласивший*/
        $arr = array();
        foreach ($partners as $row) {
            
            if(!$row || !isset($row->partner_category)) {
                continue;
            }

            $category_info = $row->partner_category->category_name;

            $arr[] =["partner_id"=>$row->id, 
                     "parent_id"=>$row->invited_id, 
                     "partner_info"=> [
                        "last_name"=>$row->last_name,
                        "first_name"=>$row->first_name,
                        "city"=>$row->city,
                        "partner_categories_id"=>$row->partner_categories_id,
                        "partner_category"=>$category_info,
                        "group_orders_total" => $row->group_orders_total,
                        "group_orders_total_all_time" => $row->group_orders_total_all_time
                     ]
                    ];
        }

        $out = array();
        
        // TODO: изменить id на $partner->id
        $count = 0;
        $network_arr = $this->search($arr, $partner->id, $out, $count);

        return view('partners_network.index', [
            'partner' => $partner,
            'partner_network' => $network_arr,
            'count' => $count
        ]);
    }


    public function search(&$arr, $parent_id, &$out, &$count)
    {

        foreach($arr as $item) {
            
            if($item['parent_id'] == $parent_id) {

                $cur_arr=[];
                
                $cur_arr = [
                    'parent_id'=>$item['parent_id'],
                    'partner_id'=>$item['partner_id'],
                    'partner_info'=>$item['partner_info']
                ];

                $count++;

                $childs = $this->search($arr, $item['partner_id'], $cur_arr, $count);
                
                $out['child'][$item['partner_id']] = $cur_arr;
                
             }            
        }
        
            return $out;
        
    }
}
