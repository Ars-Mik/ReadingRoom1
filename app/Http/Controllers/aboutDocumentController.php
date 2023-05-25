<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\ErrorHandler\Debug;
use \Debugbar;

class aboutDocumentController extends Controller
{
    public function index(Request $request, $id)
    {
        $documentSelect = DB::table('documents')
                            ->join('funds', 'documents.fund_id', '=', 'funds.id')
                            ->where('documents.id', '=', $id)
                            ->select('documents.id', 'documentName', 'fileName', 'funds.numberFund', 'access')
                            ->get();

        $documentFilter = Document::query()
                                ->filter($request->all())
                                ->distinct()
                                ->with('fund')
                                ->paginate();

        return view('about-document', ['documentSelect' => $documentSelect]);
    }
}