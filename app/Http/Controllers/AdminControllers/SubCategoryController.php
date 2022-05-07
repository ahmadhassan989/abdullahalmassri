<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::get();
     
        return view('admin.subcategory.index',compact(['subCategories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mainCategories = MainCategory::get();
        return view('admin.subcategory.create',compact(['mainCategories']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            
            'category_name' => 'required',
            'main_category' =>'required'
        ]);

        $subCategory=new SubCategory([
        'title' => $request->category_name,
        'main_category_id'=> $request->main_category,
        'description' => $request->category_description,
        ]);
        $subCategory->save();
        return redirect('/subcategory')->with('success', 'Action has been done successfully!');
     
    
    }
   
    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mainCategories = MainCategory::get();
        $categories = SubCategory::find($id)->first();
        return view('admin.subcategory.show', compact(['categories', 'mainCategories']));
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

                SubCategory::find($id)->update([
                'title' => $request->category_name,
                'description' => $request->category_description, 
                'main_category_id'=>$request->main_category 
                 ]);
 
            return redirect('/subcategory')->with('success', 'Action has been done successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubCategory::destroy($id);
        return redirect('/subcategory')->with('success', 'Action has been done successfully!');

    }
}
