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
        $theme_indices = DB::table('theme_indices')->get();
        $person_indices = DB::table('person_indices')->get();

/*         $documentSelect = DB::table('documents')
                            ->join('funds', 'documents.fund_id', '=', 'funds.id')
                            ->select('documents.id', 'documentName', 'fileName', 'funds.numberFund', 'access')
                            ->get(); */

        // $documentFilter = DB::select('SELECT DISTINCT `documentName`, `fileName`, `numberFund`, `date`, `access` FROM `documents`,`funds`, `document_geo_indices`, `geo_indices`, `person_indices`,`theme_indices`,`document_theme_indices`, `document_person_indices` WHERE fund_id = funds.id AND theme_indices.id = document_theme_indices.theme_index_id AND document_theme_indices.document_id = documents.id AND theme_indices.themeName = "'.$request->input('themeName').'" AND geo_indices.geoName = "'.$request->input('geoName').'"');

/*         $documentFilter = DB::table('documents')
                                ->join('funds', 'documents.fund_id', '=', 'funds.id')
                                ->join('document_theme_indices', 'document_theme_indices.document_id', '=', 'documents.id')
                                ->join('theme_indices', 'theme_indices.id', '=', 'document_theme_indices.theme_index_id')
                                ->join('document_geo_indices', 'document_geo_indices.document_id', '=', 'documents.id')
                                ->join('geo_indices', 'geo_indices.id', '=', 'document_geo_indices.geo_index_id')
                                ->join('document_person_indices', 'document_person_indices.document_id', '=', 'documents.id')
                                ->join('person_indices', 'person_indices.id', '=', 'document_person_indices.person_index_id');
                         if ($request->input('fundName') != null) {
                            $documentFilter->where ('theme_indices.themeName', '=', $request->input('themeName'));
                         }
                                ->orWhere('funds.fundName', '=', $request->input('fundName'))
                                ->orWhere('theme_indices.themeName', '=', $request->input('themeName'))
                                ->orWhere('geo_indices.geoName', '=', $request->input('geoName'))
                                ->orWhere('documentName', '=', $request->input('documentName'))
                                ->orWhere('person_indices.personName', '=', $request->input('personName'))
                                ->select('documents.id', 'documentName', 'fileName', 'funds.numberFund', 'access')
                                ->distinct();

                                $documentFilter = $documentFilter->get(); */

        $documentFilter = Document::query()
                                ->filter($request->all())
                                ->distinct()
                                ->with('fund')
                                ->paginate();


            // var_dump($request->input('fundName'));
            // var_dump($request->input('themeName'));
            // var_dump($request->input('geoName'));
            // var_dump($request->input('documentName'));
            // var_dump($request->input('personName'));


        return view('documents', ['funds' => $funds, 'geo_indices' => $geo_indices, 'theme_indices' => $theme_indices, 'person_indices' => $person_indices, 'documentFilter' => $documentFilter]);
    }
}

