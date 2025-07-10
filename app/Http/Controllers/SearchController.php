<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
     public function transport($type)
    {
        return view('search-results', ['type' => $type]);
    }

    public function result(Request $request)
    {
        $departure = $request->input('departure');
        $destination = $request->input('destination');
        $date = $request->input('date');
        return view('search-results', compact('departure', 'destination', 'date'));
    }
}
