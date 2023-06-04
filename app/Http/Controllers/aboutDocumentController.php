<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\HistoryApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\ErrorHandler\Debug;
use \Debugbar;

class aboutDocumentController extends Controller
{
    public function index(Request $request, $id)
    {
        $documentSelect = DB::select('SELECT DISTINCT fundName, Numberfund, documentName, geoName, themeName, personName, date, fileName, access
            FROM documents, funds, document_geo_indices, geo_indices, person_indices, theme_indices, document_theme_indices, document_person_indices
            WHERE fund_id = funds.id AND theme_indices.id = document_theme_indices.theme_index_id AND document_theme_indices.document_id = documents.id
            AND geo_indices.id = document_geo_indices.geo_index_id AND document_geo_indices.document_id = documents.id
            AND person_indices.id = document_person_indices.person_index_id AND document_person_indices.document_id = documents.id
            AND theme_indices.id = document_theme_indices.theme_index_id AND document_theme_indices.document_id = documents.id
            AND documents.id = "'.$id.'"
        ');

        if (!($documentSelect[0]->access ?? null)) {
            $order = HistoryApplication::where('user_id', Auth::id())->where('document_id', $id)->first();

            if ($order) $documentSelect[0]->access = $order->status;
        }

        return view('about-document', ['documentSelect' => $documentSelect, 'id' => $id]);
    }
}
