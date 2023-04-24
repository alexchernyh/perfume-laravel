<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MainpageBlock;

class MainpageBlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = MainpageBlock::orderBy('id', 'asc')->get();
        return view('admin.main_custom.index', [
            'list' => $list
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
        
        // $list = MainpageBlock::all()->toArray();
        $item = MainpageBlock::find($id);
        return view('admin.main_custom.edit', [
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
        
        $item = MainpageBlock::find($id);
        $item->title = $request->title;
        $item->subtitle = $request->subtitle;
        $item->name = $request->name;

        if($request->name == "faq") {
            $item->content = json_encode($request->accordion);
        } elseif($request->name == "projects") {
            $item->content = json_encode($request->project);
        } elseif($request->name == "features") {
            $item->content = json_encode($request->feature);
        } elseif($request->name == "intro") {
            $arr = [];
            $arr['content'] = $request->content;
            $arr['intro_img'] = $request->intro_img;

            $item->content = json_encode($arr);
        } 
        else {
            $item->content = $request->content;
        }


        $item->save();
        return redirect()->back()->withSuccess('Блок успешно обновлен');
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
