<?php

namespace App\Http\Controllers\AdminControllers;
use App\Http\Controllers\Controller;

use App\Models\ContactUs;
use App\User;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = ContactUs::orderBy('created_at','DESC')->get();
        return view('admin.contactus.index',compact(['messages']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            ContactUs::create([
                'from' => $request->from,
                'name' => $request->name,
                'message' => $request->message,
            ]);
      
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = ContactUs::where('id',$id)->first();
        return view('admin.contactus.show',compact(['message']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ContactUs::destroy($id);
        return redirect()->back();
    }
}
