<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PagesController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page, $path, $slug)
    {
        $page = Page::where('slug', $slug)->first();

        return view('site.contentpage.show', compact('page'));

    }

   
}
