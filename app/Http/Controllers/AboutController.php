<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(Request $request)
    {
        $funds = DB::table('funds')->get();
        $geo_indices = DB::table('geo_indices')->get();
        $theme_indices = DB::table('theme_indices')->get();
        $person_indices = DB::table('person_indices')->get();

        $documentSelect = DB::table('documents')
                            ->join('funds', 'documents.fund_id', '=', 'funds.id')
                            ->select('documents.id', 'documentName', 'fileName', 'funds.numberFund', 'access')
                            ->get();
        
        if ($request->method('post')) {
            dd($request);
        }

        $documentSelectName = DB::table('documents')
                            ->join('funds', 'documents.fund_id', '=', 'funds.id')
                            ->where('documentName', '=', $request->input('documentName'))
                            ->select('documents.id', 'documentName', 'fileName', 'funds.numberFund', 'access')
                            ->get();
        
        
       

        return view('documents', ['funds' => $funds, 'geo_indices' => $geo_indices, 'theme_indices' => $theme_indices, 'person_indices' => $person_indices, 'documentSelect' => $documentSelect, 'documentSelectName' => $documentSelectName]);
    }
}
