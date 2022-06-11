<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Product::all();
        foreach ($products as $product) {
          if ($product->id == $request->product_id) {
            $images = ProductImage::where('product_id', $product->id)->get();
            foreach ($images as $image) {
              if ($image->id == $request->id) {
                $image->is_slider = $request->is_slider;
                $image->save();
              }
              else {
                $image->is_slider = '0';
                $image->save();
              }
            }
          }
        }
    }
}
