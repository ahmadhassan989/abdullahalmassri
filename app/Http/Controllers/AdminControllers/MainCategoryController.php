<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainCategories = MainCategory::get();
        return view('admin.maincategory.index',compact(['mainCategories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.maincategory.create');

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
            'category_description' => 'required',
        ]);

        $category = new MainCategory;
        $category->title = $request->category_name;
        $category_img=$request->file('category_img');
        if ($category_img != null){
            $fileName = time().$category_img->getClientOriginalName();
            $category_img->move('images/categoriesImages/', $fileName);
            $uploadImage = 'images/categoriesImages/'.$fileName; 
            $category->image = $uploadImage;}
        $category->description = $request->category_description;
        $category->save();
        return redirect('/maincategory')->with('success', 'Action has been done successfully!');
     
    
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
        $categories = MainCategory::find($id)->first();
        return view('admin.maincategory.show', compact(['categories']));
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

        $category_img=$request->file('category_img');
            if($category_img != null){
                $fileName = time().$category_img->getClientOriginalName();
                $category_img->move('images/categoriesImages/', $fileName);
                $uploadImage = 'images/categoriesImages/'.$fileName; 
                MainCategory::find($id)->update([
                    'title' => $request->category_name,   
                    'description' => $request->category_description,  
                    'image' => $uploadImage,
                      ]);
                }
            else{
                MainCategory::find($id)->update([
                'title' => $request->category_name,   
                'description' => $request->category_description,  
                
              ]);
            }
            return redirect('/maincategory')->with('success', 'Action has been done successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MainCategory::destroy($id);
        return redirect('/maincategory')->with('success', 'Action has been done successfully!');

    }
}
