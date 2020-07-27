<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    //

    public function index(){

        //returing a view from a folder called products
        
        return view('welcome');
    }
}
