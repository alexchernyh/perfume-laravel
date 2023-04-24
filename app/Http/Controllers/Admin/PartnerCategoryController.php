<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PartnerCategory;
use App\Models\Shop;
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
        
        // Чистим введенные данные введенные пользователем

        $project1_discount = str_replace(",", ".", $request->project1_discount);
        $project1_discount = floatval($project1_discount);

        $project2_discount = str_replace(",", ".", $request->project2_discount);
        $project2_discount = floatval($project2_discount);

        $GO_total = str_replace(",", ".", $request->GO_total);
        $GO_total = floatval($GO_total);

        $NSO_total = str_replace(",", ".", $request->NSO_total);
        $NSO_total = floatval($NSO_total);

        // добавление партнера
        $new_cat = new PartnerCategory();
        $new_cat->category_name = $request->category_name;
        $new_cat->project1_discount = $project1_discount;
        $new_cat->project2_discount = $project2_discount;
        $new_cat->project1_level = $request->project1_level;
        $new_cat->project2_level = $request->project2_level;
        $new_cat->GO_total = $GO_total;
        $new_cat->NSO_total = $NSO_total;
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
        $shops = Shop::all();
        return view('admin.partner_category.edit', [ 'partnerCategory' => $partnerCategory, 'shops' => $shops ]);
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
        
        // Чистим введенные данне пользователем
        $project1_discount = str_replace(",", ".", $request->project1_discount);
        $project1_discount = floatval($project1_discount);

        $project2_discount = str_replace(",", ".", $request->project2_discount);
        $project2_discount = floatval($project2_discount);

        $GO_total = str_replace(",", ".", $request->GO_total);
        $GO_total = floatval($GO_total);

        $NSO_total = str_replace(",", ".", $request->NSO_total);
        $NSO_total = floatval($NSO_total);

        $partnerCategory->category_name = $request->category_name;
        $partnerCategory->category_discount = $request->category_discount;
        $partnerCategory->shop_id = $request->shop_id;
        /*$partnerCategory->project1_discount = $project1_discount;
        $partnerCategory->project2_discount = $project2_discount;*/
        $partnerCategory->level = $request->level;
        // $partnerCategory->project2_level = $request->project2_level;
        $partnerCategory->GO_total = $GO_total;
        $partnerCategory->NSO_total = $NSO_total;
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
