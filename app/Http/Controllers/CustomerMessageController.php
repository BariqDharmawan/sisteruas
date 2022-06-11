<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaPage;
use Mail;
use App\Mail\MessageCustomer;
use App\Models\CompanyContact;
use App\Models\CustomerMessage;
use Illuminate\Support\Facades\Route;

class CustomerMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $messages = CustomerMessage::orderBy('created_at', 'ASC')->paginate(25);
      if (Route::currentRouteName() == 'admin.company.message-customer.index') {
        return view('admin.company.customer_message', compact('messages'));
      }
      else {
        $metaMain = MetaPage::where('page_name', 'contact_us_page')->firstOrFail();
        return view('contact-us', compact('metaMain'));
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
        $companyContact = CompanyContact::first();

        $customerMessage = new CustomerMessage;
        if ($request->has('name')) {
          $customerMessage->name = $request->name;
        }
        $customerMessage->country = $request->country;
        $customerMessage->email = $request->email;
        if ($request->has('company_name')) {
          $customerMessage->company_name = $request->company_name;
        }
        $customerMessage->message = $request->message;
        $customerMessage->save();

        $message = CustomerMessage::findOrFail($customerMessage->id);
        Mail::to($companyContact->email)->send(new MessageCustomer($message));
        return redirect()->back();
    }
}
