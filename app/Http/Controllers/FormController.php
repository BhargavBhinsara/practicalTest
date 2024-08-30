<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\FormField;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        $forms = Form::all();
        return view('admin.home', compact('forms'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $form = Form::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return response()->json(['message' => 'Form saved successfully!']);
    }
}
