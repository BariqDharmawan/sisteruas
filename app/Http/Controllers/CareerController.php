<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Models\FrontText;
use App\Models\Career;
use App\Models\MetaPage;
use Illuminate\Http\Request;
use App\Models\CareerSubmit;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dynamicText = FrontText::first();
        if (Route::currentRouteName() == 'customer.career.index') {
          $metaMain = MetaPage::where('page_name', 'career_page')->firstOrFail();
          $careers = Career::all();
          return view('career.index', compact('careers', 'metaMain', 'dynamicText'));
        }
        elseif (Route::currentRouteName() == 'admin.page.career-cms.index') {
          return view('admin.content.career_cms', compact('dynamicText'));
        }
        else {
          $careers = Career::all();
          return view('admin.company.career.index', compact('careers'));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Route::currentRouteName() == 'customer.career.store') {
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
        else {
          $request->validate([
            'title' => 'required|unique:career',
            'location' => 'required',
            'job_desc' => 'required',
            'job_detail' => 'required'
          ]);
          Career::updateOrCreate([
            'title' => $request->title,
            'location' => $request->location,
            'job_desc' => $request->job_desc,
            'job_detail' => $request->job_detail
          ]);

          if ($request->filled('career_id')) {
            $updateOrCreate = 'Update';
          }
          else {
            $updateOrCreate = 'Create';
          }

          return redirect()->back()->with('success_message', 'Succesfully ' . $updateOrCreate .  ' Career');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      $career = Career::where('slug', $slug)->first();
      $metaMain = MetaPage::where('page_name', 'career_page')->firstOrFail();
      return view('career.show', compact('career', 'metaMain'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      if (Route::currentRouteName() == 'admin.page.career-cms.update') {
        $frontText = FrontText::findOrFail($id);
        if ($request->has('career_subheading_header')) {
          $frontText->career_subheading_header = $request->career_subheading_header;
        }
        elseif ($request->has('career_heading_header')) {
          $frontText->career_heading_header = $request->career_heading_header;
        }
        elseif ($request->has('career_btn_job')) {
          $frontText->career_btn_job = $request->career_btn_job;
        }
        elseif ($request->has('career_section_value_subheading')) {
          $frontText->career_section_value_subheading = $request->career_section_value_subheading;
        }
        elseif ($request->has('career_section_value_heading')) {
          $frontText->career_section_value_heading = $request->career_section_value_heading;
        }
        elseif ($request->has('career_section_value_description')) {
          $frontText->career_section_value_description = $request->career_section_value_description;
        }
        elseif ($request->has('career_team_subheading')) {
          $frontText->career_team_subheading = $request->career_team_subheading;
        }
        elseif ($request->has('career_team_heading')) {
          $frontText->career_team_heading = $request->career_team_heading;
        }
        elseif ($request->has('career_job_subheading')) {
          $frontText->career_job_subheading = $request->career_job_subheading;
        }
        elseif ($request->has('career_job_heading')) {
          $frontText->career_job_heading = $request->career_job_heading;
        }
        elseif ($request->has('career_resume_subheading')) {
          $frontText->career_resume_subheading = $request->career_resume_subheading;
        }
        elseif ($request->has('career_resume_heading')) {
          $frontText->career_resume_heading = $request->career_resume_heading;
        }
        elseif ($request->has('career_resume_btn')) {
          $frontText->career_resume_btn = $request->career_resume_btn;
        }
        $frontText->save();
        return redirect()->back()->with('success_message', 'Succesfully update career page content');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function destroy(Career $career)
    {
        $career->delete();
        return redirect()->back()->with('success_message', 'Succesfully Remove Career');
    }
}
