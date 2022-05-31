<?php
namespace App\Http\Controllers\AdminControllers;
use App\Http\Controllers\Controller;

use App\Models\Box;
use App\Models\ImageBox;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\ProductBox;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boxes = Box::all();
        
        return view('admin.boxes.index',compact(['boxes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $products = Product::all();

        return view('admin.boxes.create',compact(['products']));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $box_barcode = Str::random(10);
        $request->validate([

        ]);
        
        $box = new Box([
            'title'=>$request->input('box_title'),
            'description'=>$request->input('box_description'),
            'price'=>$request->input('price'),
            'sku' => $box_barcode,
        ]);
       
        $box->save();

        $products = $request->input('product_ids');
        foreach($products as $product){
            ProductBox::create([
                'box_id' => $box->id,
                'product_id' => $product
            ]);
        }


        $imgs=$request->file('imgs');
        $count = 0;
        foreach($imgs as $img){
            $destination = 'storage/boxes/';
            $fileName = $box->id.'_'.$count.".".$img->getClientOriginalExtension();
            $path = $img->storeAs('boxes/', $fileName);

            $img->move($destination, $fileName);
            $img_box= new ImageBox([
                'box_id' => $box->id,
                'img_url' => $path,
            ]);
            $img_box->save();
            $count++;
            }
        return redirect('/admin/boxes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Box  $box
     * @return \Illuminate\Http\Response
     */
    public function show(Box $box)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Box  $box
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::all();
        $box = Box::where('id', $id)->first();
        return view('admin.boxes.show',compact(['box','products']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Box  $box
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Box $box)
    {
    return($box->with('products')->get());

        $products = $request->input('product_ids');
        foreach($products as $product){
            ProductBox::create([
                'box_id' => $box->id,
                'product_id' => $product
            ]);
        }


        $imgs=$request->file('imgs');
        $count = 0;
        foreach($imgs as $img){
            $destination = 'storage/boxes/';
            $fileName = $box->id.'_'.$count.".".$img->getClientOriginalExtension();
            $path = $img->storeAs('boxes/', $fileName);

            $img->move($destination, $fileName);
            $img_box= new ImageBox([
                'box_id' => $box->id,
                'img_url' => $path,
            ]);
            $img_box->save();
            $count++;
            }
        return redirect()->route('boxes.index');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Box  $box
     * @return \Illuminate\Http\Response
     */
    public function destroy(Box $box)
    {
        //
    }
}
