<?php

namespace App\Http\Controllers;

use App\Models\FreesampleSection;
use Illuminate\Http\Request;
use App\Models\FrontText;

class FreesampleSectionController extends Controller
{

    public function update(Request $request, $id)
    {
        FrontText::findOrFail($id)->update(['free_sample_desc' => $request->longDescription]);
        if ($request->hasFile('cover')) {
          $path = $request->file('cover')->store('public/files');
          FreesampleSection::findOrFail($id)->update(['heading' => $request->heading, 'subheading' => $request->description, 'cover' => $path]);
        }
        else {
          FreesampleSection::findOrFail($id)->update(['heading' => $request->heading, 'subheading' => $request->description]);
        }
        return redirect()->back();
    }
}
