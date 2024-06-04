<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use App\Models\zaklad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(Request $request)
    {
        if(auth()->check()){
            $userId = auth()->user()->id;
            $zaks = zaklad::where('userid', $userId)->get();
        }else{
            $zaks = zaklad::all();
        }
        $cars = Car::all();

        


        return view('main.index', compact('cars', 'zaks'));
    }

    public function zaklad(Request $request)
    {
        $userId = auth()->user()->id;
        $zak = new zaklad();
        $zak->carid = $request->input('zkld');
        $zak->bdate= $request->bdate;
        $zak->userid = $userId;
        $zak->save();

        return redirect()->back()->with('success', 'Отзыв успешно добавлен!');
    }
}
