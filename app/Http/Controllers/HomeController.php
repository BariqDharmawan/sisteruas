<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaPage;
use App\Models\FrontText;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\FreesampleSection;
use App\Models\BenefitSection;
use App\Models\Career;
use App\Models\CareerSubmit;
use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\Client;

class HomeController extends Controller
{

    public function index() {
        return view('home');
    }
    public function landing() {
        $metaMain = MetaPage::where('page_name', 'main_page')->firstOrFail();
        $frontText = FrontText::firstOrFail();
        $productRecommend = ProductImage::where('is_slider', true)->get();
        $freeSample = FreesampleSection::first();
        $benefits = BenefitSection::all();
        return view('landing-page', compact('metaMain', 'frontText', 'productRecommend', 'freeSample', 'benefits'));
    }
    public function aboutUs() {
      $clients = Client::all();
      $metaMain = MetaPage::where('page_name', 'about_page')->firstOrFail();
      return view('about-us', compact('metaMain', 'clients'));
    }

}
