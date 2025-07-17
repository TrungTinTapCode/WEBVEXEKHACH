<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showTtmco2024()
    {
        return view('ttmco2024');
    }
     public function showTtmcovn2025()
    {
        return view('ttmcovn2025');
    }
}
