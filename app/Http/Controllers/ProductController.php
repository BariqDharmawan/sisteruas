<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductDocument;
use App\Models\MetaPage;
use App\Models\ProductProtection;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metaMain = MetaPage::where('page_name', 'product_page')->firstOrFail();
        if (Route::currentRouteName() == 'admin.company.product.index') {
          $products = Product::orderBy('created_at', 'desc')->paginate(15);
          return view('admin.company.product.index', compact('products'));
        }
        elseif (Route::currentRouteName() == 'customer.our-product.index') {
          $productRecommend = ProductImage::where('is_slider', true)->get();
          return view('product.index', compact('metaMain', 'productRecommend'));
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
        $request->validate([
          'cover' => 'mimes:jpeg,jpg,png,gif',
          'image' => 'required',
          'document' => 'required'
        ]);

        $videoUploaded = $request->video;
        $cover = $request->cover;
        $pathVideo = $videoUploaded->store('public/files');
        $pathCover = $cover->store('public/files');

        $product = Product::create([
          'slug' => Str::slug($request->title),
          'title' => $request->title,
          'subtitle' => $request->subtitle,
          'short_desc' => $request->short_desc,
          'cover' => $pathCover,
          'video' => $pathVideo,
          'content' => $request->content
        ]);

        $descriptions = $request->description;
        $texts = $request->text;
        $icons = $request->file('icon');
        for ($i = 0; $i < count($descriptions); $i++) {
          $description = $descriptions[$i];
          $text = $texts[$i];
          $icon = $icons[$i]->store('public/files');

          $productProtection = new ProductProtection;
          $productProtection->product_id = $product->id;
          $productProtection->text = $text;
          $productProtection->description = $description;
          $productProtection->icon = $icon;
          $productProtection->save();
        }

        foreach ($request->file('document') as $documentUploaded) {
          $pathDocument = $documentUploaded->store('public/files');
          $productDocument = ProductDocument::create([
            'product_id' => $product->id,
            'name' => $documentUploaded->getClientOriginalName(),
            'document' => $pathDocument
          ]);
        }
        foreach ($request->file('image') as $imageUpdloaded) {
          $pathImage = $imageUpdloaded->store('public/files');
          $productImage = new ProductImage;
          $productImage->product_id = $product->id;
          $productImage->image = $pathImage;
          $productImage->save();
        }
        ProductImage::latest()->first()->update(['is_slider' => true]);

        $request->session()->flash('alert_success', 'You have succesfully added new product');
        return redirect()->back();
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        if (Route::currentRouteName() == 'admin.company.product.show') {
          return view('admin.company.product.single', compact('product'));
        }
        else {
          $products = Product::all();
          $productRecommend = ProductImage::where('is_slider', true)->get();
          $metaMain = MetaPage::where('page_name', 'product_page')->firstOrFail();
          return view('product.single', compact('product', 'metaMain', 'products', 'productRecommend'));
        }
    }

    public function edit($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('admin.company.product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
      $updateProduct = Product::findOrFail($id);
      $updateProduct->slug = Str::slug($request->title);
      $updateProduct->title = $request->title;
      $updateProduct->subtitle = $request->subtitle;
      $updateProduct->short_desc = $request->short_desc;
      if ($request->hasFile('video')) {
        $videoUploaded = $request->file('video');
        $pathVideo = $videoUploaded->store('public/files');
        $updateProduct->video = $pathVideo;
      }
      $updateProduct->content = $request->content;
      $updateProduct->save();

      if ($request->hasFile('document')) {
        $oldDocument = ProductDocument::select('name')->where('product_id', $id)->get();
        Storage::delete($oldDocument);
        ProductDocument::where('product_id', $id)->delete();
        foreach ($request->file('document') as $documentUploaded) {
          $pathDocument = $documentUploaded->store('public/files');
          $productDocument = ProductDocument::create([
            'product_id' => $id,
            'name' => $documentUploaded->getClientOriginalName(),
            'document' => $pathDocument
          ]);
        }
      }

      if ($request->hasFile('image')) {
        $productImage = ProductImage::select('image')->where('product_id', $id)->get();
        Storage::delete($productImage);
        ProductImage::where('product_id', $id)->delete();
        foreach ($request->file('image') as $imageUpdloaded) {
          $pathImage = $imageUpdloaded->store('public/files');
          $productImage = new ProductImage;
          $productImage->product_id = $id;
          $productImage->image = $pathImage;
          $productImage->save();
        }
      }

      // $iconsBeforeUpdate = ProductProtection::select('icon')->where('product_id', $id)->get();
      $productProtectionIds = $request->id;
      $descriptions = $request->description;
      $texts = $request->text;
      if ($request->hasFile('icon')) {
        $icons = $request->file('icon');
      }
      for ($i = 0; $i < count($descriptions); $i++) {
        $productProtectionId = $productProtectionIds[$i];
        $description = $descriptions[$i];
        $text = $texts[$i];
        if (isset($icons[$i])) {
          $icon = $icons[$i]->store('public/files');
          $productProtection = ProductProtection::updateOrCreate(
            ['id' => $productProtectionId],
            ['product_id' => $updateProduct->id, 'text' => $text, 'description' => $description, 'icon' => $icon]
          );
        }
        else {
          $productProtection = ProductProtection::updateOrCreate(
            ['id' => $productProtectionId],
            ['product_id' => $updateProduct->id, 'text' => $text, 'description' => $description]
          );
        }
      }

      $request->session()->flash('alert_success', 'You have succesfully update product');
      return redirect()->route('admin.company.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->productImage()->delete();
        $product->ProductDocument()->delete();
        $product->ProductProtection()->delete();
        $product->delete();
        return redirect()->back()->with('delete', 'Product deleted successfully');
    }
}
