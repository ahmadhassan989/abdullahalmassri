<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use CreatePromocodesTable;
use Gabievi\Promocodes\Facades\Promocodes;
use Gabievi\Promocodes\Models\Promocode;
use Illuminate\Http\Request;


class PromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promocodes =Promocodes::all();



        return view('admin.promocode.index', compact(['promocodes']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.promocode.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            Promocodes::create($amount = 1,
                                $reward = $request->reward,
                                $data = [],
                                $expires_in = $request->expires_in,
                                $quantity = $request->quantity,
                                $is_disposable = false);
            return redirect('/admin/promocodes')->with('success', trans('responses.success'));

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
        $promocode = Promocode::where('id',$id)->first();
        // return $promocode;
        return view('admin.promocode.edit',compact(['promocode']));
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
        Promocode::where('id',$id)->first()
        ->update([
        'reward' => $request->reward,
        'expires_at' => $request->expires_in,
        'quantity' => $request->quantity,
        ]);
        return redirect('/admin/promocodes')->with('success', trans('responses.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
    }
}
