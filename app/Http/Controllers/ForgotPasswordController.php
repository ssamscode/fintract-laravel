<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgot-password');
    }

    public function checkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {

            return back()->withErrors([
                'email' => 'Email tidak ditemukan.'
            ]);

        }

        return redirect()->route('password.reset', $user->id);
    }

    public function reset(User $user)
    {
        return view('auth.reset-password', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'password' => [
                'required',
                'confirmed',
                'min:8'
            ]
        ]);

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()
            ->route('login')
            ->with('status', 'Password berhasil diperbarui.');
    }
}