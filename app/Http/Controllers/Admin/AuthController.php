<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        // Jika sudah login, redirect ke dashboard
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $adminUsername = env('ADMIN_USERNAME', 'angeladmin');
        $adminPassword = env('ADMIN_PASSWORD', 'cake123456');

        if ($credentials['username'] === $adminUsername 
            && $credentials['password'] === $adminPassword) {
            
            session([
                'admin_logged_in' => true,
                'admin_username' => $credentials['username']
            ]);
            
            return redirect()->route('admin.dashboard')
                ->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'login' => 'Username atau password salah.',
        ]);
    }

    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_username']);
        return redirect()->route('home')->with('success', 'Logout berhasil!');
    }

    /**
     * Helper method untuk mengecek login admin
     */
    public static function checkAdmin()
    {
        return session('admin_logged_in');
    }
}