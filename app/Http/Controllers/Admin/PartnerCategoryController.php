<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PartnerCategory;
use Illuminate\Http\Request;

class PartnerCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = PartnerCategory::all()->count();

        $list = PartnerCategory::orderBy('id', 'asc')->get();

        return view('admin.partner_category.index', [
            'list' => $list,
            'list_count' => $count
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partner_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // добавление партнера
        $new_cat = new PartnerCategory();
        $new_cat->category_name = $request->category_name;
        $new_cat->category_discount = $request->category_discount;
        $new_cat->category_description = $request->category_description;
        $new_cat->save();

        return redirect()->back()->withSuccess('Новая группа добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PartnerCategory  $partnerCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PartnerCategory $partnerCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PartnerCategory  $partnerCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PartnerCategory $partnerCategory)
    {   
        return view('admin.partner_category.edit', [ 'partnerCategory' => $partnerCategory ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PartnerCategory  $partnerCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PartnerCategory $partnerCategory)
    {
        $partnerCategory->category_name = $request->category_name;
        $partnerCategory->category_discount = $request->category_discount;
        $partnerCategory->category_description = $request->category_description;
        $partnerCategory->save();

        return redirect()->back()->withSuccess('Группа была успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PartnerCategory  $partnerCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PartnerCategory $partnerCategory)
    {
        $partnerCategory->delete();
        return redirect()->back()->withSuccess('Группа была удалена');
    }
}
