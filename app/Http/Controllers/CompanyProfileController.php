<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\CompanyContact;
use App\Models\SocialMedia;
use App\Models\ImageAsset;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyProfile = CompanyProfile::firstOrFail();
        $companyContact = CompanyContact::firstOrFail();
        $companySocial = SocialMedia::all();
        $imageAsset = ImageAsset::firstOrFail();
        return view('admin.company.profile', compact('companyProfile', 'companyContact', 'companySocial', 'imageAsset'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CompanyProfile  $companyProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyProfile $companyProfile)
    {
        $companyProfile = CompanyProfile::first();
        $admin = User::first();
        return view('admin.company.update_profile', compact('companyProfile', 'admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompanyProfile  $companyProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyProfile $companyProfile)
    {
      if ($request->hasAny(['name', 'title', 'description', 'copyright'])) {
        CompanyProfile::first()->update([
          'name' => $request->name,
          'title' => $request->title,
          'description' => $request->description,
          'copyright' => $request->copyright
        ]);
      }
      else if ($request->hasAny(['username', 'password'])) {
        User::first()->update([
          'username' => $request->username,
          'password' => Hash::make($request->password)
        ]);
      }
      return redirect()->route('admin.company.profile.index');
    }
}
