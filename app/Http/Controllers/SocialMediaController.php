<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $icon = $request->file('icon');
      $path = $icon->store('public/files');

      $iconSosmed = SocialMedia::create([
        'icon' => $path,
        'username' => $request->username,
        'social_media' => $request->social_media
      ]);
      return redirect()->back();
    }

    public function edit()
    {
      $updateSocial =  SocialMedia::all();
      return view('admin.company.update_media', compact('updateSocial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SocialMedia  $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      foreach ($request->username as $key => $username) {
        $social = SocialMedia::findOrFail($request->social_media[$key]);
        $social->username = $username;
        $social->save();
      }
      return redirect()->route('admin.company.profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SocialMedia  $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SocialMedia::findOrFail($id)->delete();
        return redirect()->back();
    }
}
