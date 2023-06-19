<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fund;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\ErrorHandler\Debug;
use \Debugbar;

class FundsController extends Controller
{
    public function index(Request $request)
    {
        $geo_indices = DB::table('geo_indices')->get();
        $funds = DB::table('funds')->get();

        $fundFilter = Fund::query()
                            ->filter($request->all())
                            ->distinct()
                            ->paginate();

        return view('funds', ['geo_indices' => $geo_indices, 'funds' => $funds, 'fundFilter' => $fundFilter]);
    }
}

