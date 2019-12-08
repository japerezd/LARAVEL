<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingVueController extends Controller
{
    //laravel convertira esto en formato JSON
    public function index()
    {
        return [
             'name'=>'Jorge',
        ];  
    }
}
