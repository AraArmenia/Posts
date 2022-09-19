<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index() {
        return view("auth.login");
    }

    public function store(Request $request) {

        
        $this->validate($request, [
            
            'email' => 'required|email',
            'password' => 'required',
        ]);

        auth()->attempt($request->only('email', 'password'), $request->remember);

        if(!auth()->attempt($request->only('email', 'password'))) {
            return back()->with("status", "Invalid user");
        }

        // redirect to external url
        // return redirect()->away('https://www.google.com');

        return redirect()->route("dashboard");
    }

    
}
