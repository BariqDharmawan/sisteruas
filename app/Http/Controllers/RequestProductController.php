<?php

namespace App\Http\Controllers;

use App\Models\RequestProduct;
use Illuminate\Http\Request;

class RequestProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $requesters = RequestProduct::orderBy('created_at', 'desc')->get();
      return view('admin.company.product.requester', compact('requesters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $requestProduct = new RequestProduct;
      $requestProduct->product_id = $request->product_id;
      $requestProduct->requester_name = $request->requester_name;
      $requestProduct->requester_email = $request->requester_email;
      $requestProduct->requester_address = $request->requester_address;
      if ($request->has('requester_company')) {
        $requestProduct->requester_company = $request->requester_company;
      }
      $requestProduct->save();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RequestProduct  $requestProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestProduct $requestProduct)
    {
        return view('admin.company.product.update_status_requester', compact('requestProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RequestProduct  $requestProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestProduct $requestProduct)
    {
      $requestProduct->update(['status' => $request->status]);
      return redirect()->route('admin.company.request-product.index')->with('status', 'Succesfully change status');
    }
}
