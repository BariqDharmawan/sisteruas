<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
      $validatedData = $request->validate([
        'name' => ['required', 'min:4', 'max:100'],
        'email' => ['required', 'email:rfc'],
        'resume' => ['required', 'file', 'max:5000', 'mimes:doc,pdf,docx']
      ]);
      $path = $request->file('resume')->store('public/files');
      Resume::create([
        'name' => $request->name,
        'email' => $request->email,
        'resume' => $path
      ]);
      return redirect()->back()->with('status', 'Your resume Has been Send');
    }
}
