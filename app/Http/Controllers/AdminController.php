<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $forms = Form::all();
        return view('admin.login', compact('forms'));
    }

    public function login(Request $request)
    {

        $validatedData = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::guard('admin')->attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
            $admin = Auth::guard('admin')->user();
            if ($admin->is_admin) {
                return redirect()->route('home');
            } else {
                Auth::guard('admin')->logout();
                return redirect()->route('login')->with('error', 'Your not athorized user..!!');
            }
        } else {
            return redirect()->route('login')->with('error', 'Data not match!');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }
}
