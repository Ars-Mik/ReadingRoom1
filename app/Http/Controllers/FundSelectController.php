<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\ErrorHandler\Debug;
use \Debugbar;

class FundSelectController extends Controller
{
    public function index(Request $request)
    {   
        $Funds = DB::select("SELECT DISTINCT `numberFund`, `fundName`,`startDate`, `endDate` FROM `funds`,`document_inventories`,`documents` 
        WHERE funds.id = $request->id");

        $geoPointer = DB::select("SELECT DISTINCT `geoName` FROM `geo_indices`,`document_geo_indices`,`documents`,`document_inventories`,`funds` 
        WHERE geo_indices.id = document_geo_indices.geo_index_id 
        AND document_geo_indices.document_id = documents.id
        AND documents.document_inventory_id = document_inventories.id
        AND document_inventories.fund_id = funds.id
        AND funds.id = $request->id");

        $allDocument = DB::select("SELECT DISTINCT documents.id, `documentName`, `caseNumber`, `fileName`, `access` FROM `documents`, `document_inventories`, `funds` 
        WHERE documents.document_inventory_id = document_inventories.id
        AND funds.id = document_inventories.fund_id
        AND funds.id = $request->id");

        return view('fund-select', ['Funds' => $Funds, 'geoPointer' => $geoPointer, 'allDocument' => $allDocument]);
    }
}

