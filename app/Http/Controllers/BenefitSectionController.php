<?php

namespace App\Http\Controllers;

use App\Models\BenefitSection;
use Illuminate\Http\Request;

class BenefitSectionController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('icon')->store('public/files');
        BenefitSection::create([
          'title' => $request->title,
          'description' => $request->description,
          'icon' => $path
        ]);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BenefitSection  $benefitSection
     * @return \Illuminate\Http\Response
     */
    public function edit(BenefitSection $benefit)
    {
        return view('admin.company.benefit.edit', compact('benefit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BenefitSection  $benefitSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('icon')) {
          $path = $request->file('icon')->store('public/files');
          BenefitSection::findOrFail($id)->update(['title' => $request->title, 'description' => $request->description, 'icon' => $path]);
        }
        else {
          BenefitSection::findOrFail($id)->update(['title' => $request->title, 'description' => $request->description]);
        }
        return redirect()->route('admin.page.home.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BenefitSection  $benefitSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(BenefitSection $benefit)
    {
        $benefit->delete();
        return redirect()->route('admin.page.home.index');
    }
}
