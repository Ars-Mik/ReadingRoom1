<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\HistoryApplication;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DocumentFileController extends Controller
{
    public function getFileContent(Document $document)
    {
        /** @var User $user */
        $user = Auth::user();

        if (
            $document->access ||
            $user->isAdmin() ||
            HistoryApplication::query()
                ->where('user_id', $user->id)
                ->where('document_id', $document->id)
                ->where('status', 1)
                ->exists()
        ) return response()->file(storage_path("pdf/$document->id/$document->fileName"));

        abort('403');
    }
}
