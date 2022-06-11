<?php

namespace App\Http\Controllers;

use App\Models\CompanyContact;
use Illuminate\Http\Request;

class CompanyContactController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CompanyContact  $companyContact
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyContact $companyContact)
    {
      $companyContact = CompanyContact::first();
      return view('admin.company.update_contact', compact('companyContact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompanyContact  $companyContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyContact $companyContact)
    {
      CompanyContact::first()->update([
        'email' => $request->email,
        'telphone' => $request->telphone,
        'whatsapp' => $request->whatsapp,
        'address' => $request->address,
        'location' => $request->location
      ]);
      return redirect()->route('admin.company.profile.index');
    }
}
