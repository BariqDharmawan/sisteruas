<?php

namespace App\Http\Controllers;

use App\Models\CareerSubmit;
use Illuminate\Http\Request;

class CareerSubmitController extends Controller
{

    public function __invoke(Request $request)
    {
      $request->validate([
        'first_name' => 'required|alpha',
        'last_name' => 'required|alpha',
        'email' => 'required|email:rfc',
        'phone' => 'required|numeric',
        'address' => 'required',
        'resume' => 'required|file|mimes:doc,pdf,docx'
      ]);
      $submitCareer = new CareerSubmit;
      $submitCareer->career_id = $request->career_id;
      $submitCareer->fullname = $request->first_name . ' ' . $request->last_name;
      $submitCareer->email = $request->email;
      $submitCareer->phone = $request->country_code . $request->phone;
      $submitCareer->address = $request->address;
      if ($request->has('summary')) {
        $submitCareer->summary = $request->summary;
      }
      $uploadedFile = $request->file('resume');
      $path = $uploadedFile->store('public/files');
      $submitCareer->resume = $path;
      $submitCareer->save();
      return redirect()->route('customer.career.index')->with('status-applicant', 'Your application Has been submited');
    }
}
