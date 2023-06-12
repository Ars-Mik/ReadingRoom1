<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        Application::create([
            'user_id' => Auth::id(),
            'document_id' => $request->id
        ]);

        return response('');
    }
}
