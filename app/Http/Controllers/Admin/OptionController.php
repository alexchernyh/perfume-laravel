<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $options = Option::all()->toArray();
        $arr = [];
        foreach ($options as $option) {
            $arr[$option['option_name']] = $option['option_value'];
        } 

        // $list = Option::orderBy('id', 'asc')->get();
        return view('admin.option.index', [
            'list' => $arr
        ]);

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        Option::where('option_name', '=', 'sitename')->update(['option_value' => $request->sitename]);     
        Option::where('option_name', '=', 'seo_site_title')->update(['option_value' => $request->seo_site_title]);     
        Option::where('option_name', '=', 'footer_copyright_text')->update(['option_value' => $request->footer_copyright_text]);    
        Option::where('option_name', '=', 'seo_site_name')->update(['option_value' => $request->seo_site_name]);     
        Option::where('option_name', '=', 'footer_copyright_date')->update(['option_value' => $request->footer_copyright_date]);     

        return redirect()->back()->withSuccess('Параметы обновлены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        //
    }
}
