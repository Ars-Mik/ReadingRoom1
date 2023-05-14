<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index()
    {
        $funds = DB::table('funds')->get();
        $geo_indices = DB::table('geo_indices')->get();
        $theme_indices = DB::table('theme_indices')->get();
        $person_indices = DB::table('person_indices')->get();

        return view('about', compact(['funds', 'geo_indices', 'theme_indices', 'person_indices']));
    }
}
