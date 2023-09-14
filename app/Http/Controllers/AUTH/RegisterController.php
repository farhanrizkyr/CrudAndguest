<?php

namespace App\Http\Controllers\AUTH;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
class RegisterController extends Controller
{
   public function index()
    {
         return view('Auth.register');
    }

    public function register()
    {
        Request()->validate([
        'name'=>'required',
        'username'=>'required',
        'email'=>'required',
        'password'=>'required',
        ]);

        User::create([
        'name'=>request()->name,
        'username'=>request()->username,
        'email'=>request()->email,
        'password'=>Hash::make(request()->password),

        ]);

        return redirect('/login');
    }
}
