<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $departments = Department::all();
        return view('user.create', compact('departments'));
    }
    public function log(Request $request)
    {
        $departments = Department::all();
        return view('user.login', compact('departments'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sername' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|unique:users',
            'password' => 'required|confirmed',
            'department' => 'required',
            'UserPhoto' => 'nullable|image',
        ]);

        $data = $request->all();
        $data['UserPhoto'] = User::uploadImage($request);


        $user = User::create($data);
        return redirect()->back()->with('message', 'Пользователь успешно зарегистрирован');
    }

    public function car(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $data = $request->all();
        $car = Car::create($data);
        return redirect()->back()->with('message');
    }
}
