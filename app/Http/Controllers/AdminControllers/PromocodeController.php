<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Promocode;
use Carbon\Carbon;
use CreatePromocodesTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promocodes =Promocode::all();
        // $promocodes=Promocode::with('users')->where('id' , 1)->get();
        return view('admin.promocode.index',compact('promocodes'));

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
        $expires_in = Carbon::now()->addDays($request->expires_in);

        Promocode::create(['code' =>  Str::random(6),
                            'reward' => $request->reward,
                            'remaining_quantity' =>$request->quantity ,
                            'total_quantity' => $request->quantity ,
                            'expires_at' => $expires_in ]);
            return redirect()->route('promocodes.index')->with('success', trans('responses.success'));

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
        'total_quantity' => $request->quantity,
        ]);
        return redirect()->route('promocodes.index')->with('success', trans('responses.success'));
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

    public function apply($code)
    {
        $promocode = Promocode::where('code' , $code)->first();
        $promocode->users()->attach(auth()->id(), [
            'promocode_id' => $promocode->id,
            'used_at' => Carbon::now(),
        ]);
    }

    public function checkPromocodeUsage(Request $request)
    {
            if (!auth()->check()) {

           return response('notAuth',419);
        }

        $promocode = Promocode::findorfail($request->code);

         // if date now > code expiration
        // if user used this promo
        // if code max usage < current

        $data['status'] = true;
        $data['discount_amount'] = $promocode->reward * 10 ;
        $data['code_id'] = $promocode->id;

        // $cart = \Session::get('cart');
        // $cart ['promo_code'] = $data ;
        // \Session::put('cart', $cart);

        return response($data,200);


        // move after payment status is success

            // $promocode->users()->attach(auth()->id(), [
            //     'promocode_id' => $promocode->id,
            //     'used_at' => Carbon::now(),
            // ]);
            // if (!is_null($promocode->remaining_quantity)) {
            //     $promocode->remaining_quantity -= 1;
            //     $promocode->save();
            // }





    }








}
