<?php

namespace App\Http\Controllers;

use App\Models\FrontText;
use Illuminate\Http\Request;
use App\Models\ImageAsset;
use App\Models\ProductImage;
use App\Models\Product;
use App\Models\BenefitSection;
use App\Models\FreesampleSection;
use App\Models\Resume;
use App\Models\CareerSubmit;
use App\Models\Career;
use Illuminate\Support\Facades\Route;

class FrontTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dynamicText = FrontText::first();
        $imageAsset = ImageAsset::first();
        $productRecommend = ProductImage::where('is_slider', true)->get();
        $benefitSlider = BenefitSection::all();
        $freeSample = FreesampleSection::first();
        $products = Product::all();
        $resumes = Resume::paginate(20);
        $careers = Career::orderBy('created_at', 'ASC')->get();
        $submissions = CareerSubmit::orderBy('created_at', 'ASC')->get();
        if (Route::currentRouteName() == 'admin.page.home.index') {
          return view('admin.content.homepage', compact('dynamicText', 'imageAsset', 'products', 'productRecommend', 'benefitSlider', 'freeSample'));
        }
        elseif (Route::currentRouteName() == 'admin.page.contact-us.index') {
          return view('admin.content.contact-us', compact('dynamicText', 'imageAsset'));
        }
        elseif (Route::currentRouteName() == 'admin.page.career.index') {
          return view('admin.content.career', compact('dynamicText', 'resumes', 'submissions', 'careers'));
        }
        elseif (Route::currentRouteName() == 'admin.page.product.index') {
          return view('admin.content.product', compact('dynamicText', 'products', 'productRecommend'));
        }
        elseif (Route::currentRouteName() == 'admin.page.client.index') {
          return view('admin.content.client', compact('dynamicText'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FrontText  $frontText
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Route::currentRouteName() == 'admin.page.home.update') {
          if ($request->has('btn_free_sample')) {
            FrontText::findOrFail($id)->update(['btn_free_sample' => $request->btn_free_sample]);
          }
          elseif ($request->has('benefit_heading')) {
            FrontText::findOrFail($id)->update(['benefit_heading' => $request->benefit_heading]);
          }
          elseif ($request->has('benefit_secondary')) {
            FrontText::findOrFail($id)->update(['benefit_secondary' => $request->benefit_secondary]);
          }
          elseif ($request->has('free_sample_heading')) {
            FrontText::findOrFail($id)->update(['free_sample_heading' => $request->free_sample_heading]);
          }
          elseif ($request->has('free_sample_secondary')) {
            FrontText::findOrFail($id)->update(['free_sample_secondary' => $request->free_sample_secondary]);
          }
          elseif ($request->has('product_heading')) {
            FrontText::findOrFail($id)->update(['product_heading' => $request->product_heading]);
          }
          elseif ($request->has('product_secondary')) {
            FrontText::findOrFail($id)->update(['product_secondary' => $request->product_secondary]);
          }
        }
        elseif (Route::currentRouteName() == 'admin.page.contact-us.update') {
          if ($request->has('contact_us_header')) {
            FrontText::findOrFail($id)->update(['contact_us_heading' => $request->contact_us_header]);
          }
        }
        return redirect()->back();
    }
}
