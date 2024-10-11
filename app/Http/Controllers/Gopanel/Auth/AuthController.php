<?php

namespace App\Http\Controllers\Gopanel\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function index()
    {
        return view('gopanel.pages.auth.login');
    }

    /**
     * @throws Exception
     */
    public function login(LoginRequest $request)
    {
        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember_me))
            return redirect()->route('gopanel.dashboard');
        else
            throw ValidationException::withMessages([
                'email_or_password_incorrect' => 'Email və ya şifrə səhvdir',
            ]);
    }


    public function logout(Request $request)
    {
        auth()->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/gopanel/login');
    }
}
