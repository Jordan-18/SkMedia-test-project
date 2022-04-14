<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('pages.frontend.login');
    }

    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:3|max:255',
        ]);
            $validatedData['slug'] = Str::slug($request->name);
            // checking, apakah username telah ada atau belum 
            $users = User::where('name', '=', $request->input('name'))->first();
            if ($users === null) {
                $validatedData['password'] = Hash::make($validatedData['password']);
                User::create($validatedData);
                return back()->with('success', 'Registration Successfull');
            } else {
                return back()->with('failed', 'Registration Failed');
            }
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('failed','Login Failed');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
