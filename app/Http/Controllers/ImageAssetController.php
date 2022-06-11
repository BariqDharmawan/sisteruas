<?php

namespace App\Http\Controllers;

use App\Models\ImageAsset;
use Illuminate\Http\Request;

class ImageAssetController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file-img-primary')) {
          $uploadedFile = $request->file('file-img-primary');
          $fieldLogo = 'logo_menu';
        }
        elseif ($request->hasFile('file-img-secondary')) {
          $uploadedFile = $request->file('file-img-secondary');
          $fieldLogo = 'logo_footer';
        }
        elseif ($request->hasFile('file-favicon')) {
          $uploadedFile = $request->file('file-favicon');
          $fieldLogo = 'favicon';
        }
        $path = $uploadedFile->store('public/files');
        $file = ImageAsset::updateOrCreate(
          ['id' => 1],
          [$fieldLogo => $path]
        );
        return redirect()->back()->withSuccess(sprintf('File %s has been uploaded.', $file->title));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ImageAsset  $imageAsset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageAsset $imageAsset)
    {
        if ($request->hasFile('change_home_thumbnail')) {
          $path = $request->file('change_home_thumbnail')->store('public/files');
          $imageAsset->update(['header_home' => $path]);
        }
        elseif ($request->hasFile('change_contact_thumbnail')) {
          $path = $request->file('change_contact_thumbnail')->store('public/files');
          $imageAsset->update(['img_contact' => $path]);
        }
        elseif ($request->hasFile('change_career_thumbnail')) {
          $path = $request->file('change_career_thumbnail')->store('public/files');
          $imageAsset->update(['header_career' => $path]);
        }
        elseif ($request->hasFile('change_benefit_career')) {
          $path = $request->file('change_benefit_career')->store('public/files');
          $imageAsset->update(['benefit_career' => $path]);
        }
        elseif ($request->hasFile('change_team_career1')) {
          $path = $request->file('change_team_career1')->store('public/files');
          $imageAsset->update(['team_career1' => $path]);
        }
        elseif ($request->hasFile('change_team_career2')) {
          $path = $request->file('change_team_career2')->store('public/files');
          $imageAsset->update(['team_career2' => $path]);
        }
        return redirect()->back();
    }

}
