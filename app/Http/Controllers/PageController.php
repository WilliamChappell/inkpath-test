<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\APIService;

class PageController extends Controller
{
    function index()
    {
        return view('index');
    }
}
