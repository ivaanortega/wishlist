<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    //on load chcek if user is logged in

    public function __construct()
    {
        if (Auth::check()) {
            
            return view('login');
        } else {
            return view('lists.index');
        }
    }
}


 
