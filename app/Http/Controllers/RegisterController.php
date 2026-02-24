<?php

namespace App\Http\Controllers;

use App\Mail\UserRegistrationEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $fields = request()->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed'],
        ]);

        if ($user = User::create($fields)){
            Mail::to($user->email)->queue(new UserRegistrationEmail($user));

            Auth::login($user);

            return redirect()->route('home');
        }

        abort(500);
    }
}
