<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }
    
    public function viewLicenciaturas(){
        return view('licenciaturas');
    }

    public function viewQuejasComentarios(){
        return view('sugges');
    }
}
