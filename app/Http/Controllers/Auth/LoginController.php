<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('connexion');
    }
    public function authenticate(Request $request): RedirectResponse
    {
       
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        // Retrieve the user by email
        $user = User::where('email', $credentials['email'])->first();
    
        // If no user found or password doesn't match
        if (!$user || $user->password !== $credentials['password']) {
            return back()->withErrors([
                'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
            ])->onlyInput('email');
        }
    
        // If user and password match, log in the user
        Auth::login($user);
    
        // Regenerate session
        $request->session()->regenerate();
    
        return redirect()->intended('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
