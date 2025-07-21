<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function transport($type)
    {
        return view('detail');
    }

}
