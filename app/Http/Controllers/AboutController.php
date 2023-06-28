<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\ErrorHandler\Debug;
use \Debugbar;

class AboutController extends Controller
{
    public function index(Request $request)
    {
        $funds = DB::table('funds')->get();
        $geo_indices = DB::table('geo_indices')->get();
        $document_types = DB::table('document_types')->get();
        $person_indices = DB::table('person_indices')->get();

/*         $documentSelect = DB::table('documents')
                            ->join('funds', 'documents.fund_id', '=', 'funds.id')
                            ->select('documents.id', 'documentName', 'fileName', 'funds.numberFund', 'access')
                            ->get(); */
                            
        $documentFilter = Document::query()
                                ->filter($request->all())
                                ->distinct()
                                ->with('documentInventory')
                                ->paginate(perPage: 10);
                                

        return view('documents', ['funds' => $funds, 'geo_indices' => $geo_indices, 'document_types' => $document_types, 'person_indices' => $person_indices, 'documentFilter' => $documentFilter]);
    }
}

