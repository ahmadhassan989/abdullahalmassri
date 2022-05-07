<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\Unit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(15);
        return view('admin.products.index',compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productMainCategory = MainCategory::with('subcategories')->get();
        $units = Unit::get();
        
        return view('admin.products.create',compact(['productMainCategory', 'units']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $this->validate($request, [
        //     'main_category' => 'required' ,
        //     'sub_category' => 'required' ,
        //     'product_name' => 'required' ,
        //     'price' => 'required' ,
        //     'product_unit' => 'required' ,
        //     'product_photo' => 'required' ,
        //     'product_description' => 'required' ,   
        // ]);

        
    // product slug
        $product_slug = Str::slug($request->input('product_name',Str::random(6)));    // Product barcode
        $product_barcode = Str::random(10);

        $category_img=$request->file('product_img');
        if($category_img != null){
            $fileName = time().$category_img->getClientOriginalName();
            $category_img->move('images/categoriesImages/', $fileName);
            $uploadImage = 'images/categoriesImages/'.$fileName; 
    
        }
   
        $product = new Product([
            'main_category_id'=>$request->input('main_category'),
            'sub_category_id'=>$request->input('sub_category'),
            'product_name'=>$request->input('product_name'),
            'product_slug'=> $product_slug,
            'price'=>$request->input('price'),
            'sku'=>$product_barcode,
            'product_unit_id'=>$request->input('product_unit'),
            'product_description'=>$request->input('product_description'),
            'img_url'=>$uploadImage,
        ]);
        $product->save();
        return redirect('/product')->with('success', 'Action has been done successfully!');
    
}

    

    /**
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
    public function edit($product_slug)
    {
        $product = Product::where('product_slug',$product_slug)->first();
        // dd($product);
        $productMainCategory = MainCategory::with('subcategories')->get();
        $unit = Unit::get();
        
        return view('admin.products.show', compact(['product', 'productMainCategory', 'unit']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_slug)
    {
        
           // product slug
           $product_slug = Str::slug($request->input('product_name'));
           // Product barcode
            $product_barcode = Str::random(10);
       
        Product::where('product_slug',$product_slug)
            ->update([
                'main_category_id'=>$request->input('main_category'),
                'sub_category_id'=>$request->input('sub_category'),
                'product_name'=>$request->input('product_name'),
                'product_slug'=> $product_slug,
                'price'=>$request->input('price'),
                'product_barcode'=>$product_barcode,
                'product_unit_id'=>$request->input('product_unit'),
                'product_description'=>$request->input('product_description'),
            ]);
            return redirect('/product')->with('success', 'Action has been done successfully!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_slug)
    {
        Product::where('product_slug',$product_slug)->delete();
        return redirect('/product')->with('success', 'Action has been done successfully!');

    }

}
