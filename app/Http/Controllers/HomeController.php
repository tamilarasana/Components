<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role_as == 'superadmin') {

            return redirect('superadmincategories');
        } 
        else if(Auth::user()->role_as == 'admin')  
        {
            // return redirect('/')->with('status','Logged In Successfully');

            return redirect()->route('categories.index');
        }
        else if(Auth::user()->role_as == 'user')
        {
            return redirect('/')->with('status','Logged In Successfully');

        }else{

            return redirect('/login');
        }
    }

        // return view('home');
    


    public function logout () {
        auth()->logout();
        return redirect('/');
    }
}
