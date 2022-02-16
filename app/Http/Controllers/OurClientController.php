<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class OurClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Project::where('use_on_clients',1)->get();

        return view('site.our-clients.index', compact('clients')); 
    }
}
