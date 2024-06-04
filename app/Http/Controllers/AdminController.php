<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(Request $request){
        $users=User::all();
        $cars=Car::all();
        return view('admin.index', compact('users','cars'));

    }
}
