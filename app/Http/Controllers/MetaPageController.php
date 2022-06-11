<?php

namespace App\Http\Controllers;

use App\Models\MetaPage;
use App\Models\Keyword;
use Illuminate\Http\Request;

class MetaPageController extends Controller
{

    public function index()
    {
        $metaMain = MetaPage::where('page_name', 'main_page')->firstOrFail();
        $keywords = MetaPage::where('page_name', 'main_page')->firstOrFail()->keywords;
        return view('admin.meta.main', compact('metaMain', 'keywords'));
    }

    public function updateMeta(Request $request, $id)
    {
        $metaPage = MetaPage::findOrFail($id);
        $metaPage->description = $request->description;
        $metaPage->save();
    }

    public function updateThumbnail(Request $request, $id)
    {
      if ($request->has('thumbnail_main')) {
        $uploadedFile = $request->file('thumbnail_main');
      }
      elseif ($request->has('thumbnail_career')) {
        $uploadedFile = $request->file('thumbnail_career');
      }
      elseif ($request->has('thumbnail_contact')) {
        $uploadedFile = $request->file('thumbnail_contact');
      }
      elseif ($request->has('thumbnail_faq')) {
        $uploadedFile = $request->file('thumbnail_faq');
      }
      elseif ($request->has('thumbnail_about')) {
        $uploadedFile = $request->file('thumbnail_about');
      }
      elseif ($request->has('thumbnail_product')) {
        $uploadedFile = $request->file('thumbnail_product');
      }
      $path = $uploadedFile->store('public/files');
      // dd($path);
      $updateThumbnail = MetaPage::findOrFail($id);
      $updateThumbnail->thumbnail = $path;
      $updateThumbnail->save();
      return redirect()->back()->with('update-thumbnail', 'Succesfully update thumbnail');
    }

    public function career()
    {
      $metaCareer = MetaPage::where('page_name', 'career_page')->firstOrFail();
      $keywords = MetaPage::where('page_name', 'career_page')->firstOrFail()->keywords;
      return view('admin.meta.career', compact('metaCareer', 'keywords'));
    }

    public function product()
    {
      $metaProduct = MetaPage::where('page_name', 'product_page')->firstOrFail();
      $keywords = MetaPage::where('page_name', 'product_page')->firstOrFail()->keywords;
      return view('admin.meta.product', compact('metaProduct', 'keywords'));
    }

    public function about()
    {
      $metaAbout = MetaPage::where('page_name', 'about_page')->firstOrFail();
      $keywords = MetaPage::where('page_name', 'about_page')->firstOrFail()->keywords;
      return view('admin.meta.about', compact('metaAbout', 'keywords'));
    }

    public function faq()
    {
      $metaFaq = MetaPage::where('page_name', 'faq_page')->firstOrFail();
      $keywords = MetaPage::where('page_name', 'faq_page')->firstOrFail()->keywords;
      return view('admin.meta.faq', compact('metaFaq', 'keywords'));
    }

    public function contactUs()
    {
      $metaContact = MetaPage::where('page_name', 'contact_us_page')->firstOrFail();
      $keywords = MetaPage::where('page_name', 'career_page')->firstOrFail()->keywords;
      return view('admin.meta.contact-us', compact('metaContact', 'keywords'));
    }

}
