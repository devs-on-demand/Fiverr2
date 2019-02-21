<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admins', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        //Validate the form data.
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Attempt to login
        if(Auth::guard('admins')->attempt(['email'=> $request->email, 'password'=> $request->password], $request->remember))
        {
            // if succesfull, then redirect to intended location
            return redirect()->intended(route('admin.dashboard'));
        }
        else
        {
            //is unsuccessfull, then redirect back to the login with the form data
            return redirect()->back()->withInput($request->only('email','remember'));
        }

    }

    public function logout()
    {
        Auth::guard('admins')->logout();

        return redirect('/');
    }

}
