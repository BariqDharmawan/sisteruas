<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\MetaPage;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Route::currentRouteName() == 'customer.frequently-ask-question.index') {
          $metaMain = MetaPage::where('page_name', 'faq_page')->firstOrFail();
          $faqs = Faq::where('is_visible', 'show')->get();
          $faqCategory = FaqCategory::all();
          return view('faq', compact('metaMain', 'faqs', 'faqCategory'));
        }
        else {
          $faqCategory = FaqCategory::all();
          $faqs = Faq::all();
          return view('admin.company.faq.index', compact('faqCategory', 'faqs'));
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
        if ($request->hasAny(['question', 'answer', 'is_visible'])) {
          $faq = new Faq;
          $faq->question = $request->question;
          $faq->answer = $request->answer;
          if ($request->has('is_visible')) {
            $faq->is_visible = $request->is_visible;
          }
          $faq->faq_category_id = $request->faq_category;
          $faq->save();
          return redirect()->back();
        }
        else {
          FaqCategory::updateOrCreate(
            ['category' => $request->category],
            ['category' => $request->category]
          );
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);
        $faq->is_visible = $request->isVisible;
        $faq->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
      $faq->delete();
      return redirect()->back();
    }
    public function destroyCategory(FaqCategory $category)
    {
      $category->faq()->delete();
      $category->delete();
    }
}
