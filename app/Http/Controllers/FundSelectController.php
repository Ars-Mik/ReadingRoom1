<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\ErrorHandler\Debug;
use \Debugbar;

class FundSelectController extends Controller
{
    public function index(Request $request)
    {
        $geo_indices = DB::table('geo_indices')->get();

        return view('fund-select', ['geo_indices' => $geo_indices]);
    }
}

