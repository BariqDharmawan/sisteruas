<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use Illuminate\Http\Request;

class KeywordController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $keywords = $request->keyword;
      $metaId = $request->meta_page_id;
      $keyword = explode(",", $keywords);
      foreach ($keyword as $value) {
        $addKey = new Keyword;
        $addKey->meta_page_id = $request->meta_page_id;
        $addKey->keyword = $value;
        $addKey->save();
      }
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Keyword  $keyword
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keyword $keyword)
    {
      $keyword->delete();
    }
}
