<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Unit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
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
        $products = Product::all();
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

        $product_slug = Str::slug($request->input('product_name',Str::random(6)));    // Product barcode
        $product_barcode = Str::random(10);



        // // }

        $product = new Product([
            'main_category_id'=>$request->input('main_category'),
            'sub_category_id'=>$request->input('sub_category'),
            'product_name'=>$request->input('product_name'),
            'product_slug'=> $product_slug,
            'price'=>$request->input('price'),
            'sku'=>$product_barcode,
            'product_unit_id'=>$request->input('product_unit'),
            'product_description'=>$request->input('product_description'),
            'img_url'=>'default.png',
        ]);
        $product->save();

        // $imgs=$request->file('imgs');
        // $count = 0;
        if(count($request->file('imgs')) > 0 ) {

            foreach ($request->file('imgs') as $one) {
                $image = new ProductImage();
                $path = $one->store('/images', $image);
                $image->img_url = $path;
                $image->product_id = $product->id;
                $image->save();
                // $coverUrl = url('/storage/images/courseCoverImg/'.$image);

            }
<<<<<<< HEAD
        }
        // foreach($imgs as $img){
        //     $destination = 'storage/products/'.$product->main_category_id;
        //     $fileName = $product->product_name.'_'.$count.".".$img->getClientOriginalExtension();
        //     $path = $img->storeAs('products/'.$product->main_category_id, $fileName);

        //     ///////////////////


        //     ///////////////////
        //     // $img->move($destination, $fileName);
        //     $img_prod= new ProductImage([
        //         'product_id' => $product->id,
        //         'img_url' => $path,
        //     ]);
        //     $img_prod->save();
        //     $count++;
        //     }
        return redirect('/admin/product')->with('success', 'Action has been done successfully!');

=======
        return redirect('/admin/product');
    
>>>>>>> 5f69f542712a1c995a3e035884d7c7bf6fe2a306
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
        $units = Unit::get();


        return view('admin.products.show', compact(['product', 'productMainCategory', 'units']));
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
                'sku'=>$product_barcode,
                'product_unit_id'=>$request->input('product_unit'),
                'product_description'=>$request->input('product_description'),
                'status' =>$request->input('status'),
            ]);
            $product = Product::where('product_slug',$product_slug)->first();
            $imgs=$request->file('imgs');
            $count = 0;
            if($imgs !=null){
            foreach($imgs as $img){
                $destination = 'storage/products/'.$product->main_category_id;
                $fileName = $product->product_name.'_'.$count.".".$img->getClientOriginalExtension();
                $path = $img->storeAs('products/'.$product->main_category_id, $fileName);

                $img->move($destination, $fileName);
                $img_prod = ProductImage::create([
                    'product_id' =>$product->id,
                    'img_url' => $path,
                ]);
                $img_prod->save();
                $count++;
                }
            }

            // update old pics
            // s
            //
            //
            //

            return redirect('/admin/product')->with('success', 'Action has been done successfully!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_slug)
    {
        $delete_prod = Product::where('product_slug',$product_slug)->first();

        $delete_prod->productimgs()->delete();
        $delete_prod = Product::where('product_slug',$product_slug)->delete();

        return redirect('/admin/product')->with('success', 'Action has been done successfully!');

    }


}
