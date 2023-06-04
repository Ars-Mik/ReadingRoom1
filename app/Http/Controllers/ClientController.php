<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ClientController extends Controller
{
    public function edit()
    {
        /** @var $user User */
        $user = Auth::user();

        return view('client.edit', $user->only(['name', 'second_name', 'third_name', 'email']));
    }

    public function update(
        ClientUpdateRequest $request
    ): RedirectResponse
    {
        $validated = $request->validated();

        $user = Auth::user();

        $user->name = $validated['name'];
        $user->second_name = $validated['second_name'];
        $user->third_name = $validated['third_name'];

        if (isset($validated['password']) && Hash::check($validated['old_password'], $user->getAuthPassword())) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return back();
    }
}