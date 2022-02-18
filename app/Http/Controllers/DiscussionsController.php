<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;

class DiscussionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = Thread::published()->get();
        return view('site.discussions.index', compact('threads'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ThreadTopic='',$slug)
    {
        $thread = Thread::where('slug', $slug)->first();
        return view('site.discussions.show', compact('thread'));
    }

}
