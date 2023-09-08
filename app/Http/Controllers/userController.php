<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class userController extends Controller
{
    public function register(Request $request)
    {
        $incomingFields = $request->validate(
            [
                'name' => ['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => ['required', 'min:4', 'max:120']
            ]
        );
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        if (auth()->check()) {
            return redirect('/home')->with('message', "This is Success Message");
        }
    }
    public function logout(Request $request): RedirectResponse
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'loginName' => 'required',
            'loginPassword' => 'required',
        ]);
        $remember = $request->has('remember') ? true : false;
        if (
            auth()->attempt(
                [
                    'name' => $incomingFields['loginName'],
                    'password' => $incomingFields['loginPassword'],
                ],
                $remember
            )
        ) {
            $request->session()->regenerate();
            return redirect('/home');
        }
        return back()->withInput()->withErrors(['loginName' => 'invalid log in credentials.', 'loginPassword' => 'required']);
        //Authentication failed, alert the user


    }
}