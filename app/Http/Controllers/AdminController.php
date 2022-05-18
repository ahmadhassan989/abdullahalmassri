<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::where('role','!=','admin')->count();
        $orders = 4;
        $pending = 3;

        return view('admin.dashboard',compact(['users','orders','pending']));
    }
}
