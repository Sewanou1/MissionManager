<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        //
        return view('authentification.login');
    }



    public function submit(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6'
        ]);
        $admin= User::where('email',$request->email)->first();
        if (!isset($admin)) {
            toastr()->error('Vous n\'êtes pas autorisé Veuillez contacter l\'admin');
            return redirect()->back()->withInput($request->only('email', 'remember'));
        } else {
            if (auth('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                toastr()->success('Welcome');
                return redirect()->route('admin.accueil');
            }
        }

        toastr()->error('Email ou mot de passe incorrect.');
        return redirect()->back()->withInput($request->only('email', 'remember'));

    }



    public function logout(Request $request){
        auth()->guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('admin.auth.login');
    }

}
