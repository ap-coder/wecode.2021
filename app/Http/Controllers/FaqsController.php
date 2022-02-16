<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqCategory;
use App\Models\FaqQuestion;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqQuestions = FaqQuestion::with(['category'])->get();
        $faqCategories = FaqCategory::get();

        return view('site.faqs.index', compact('faqQuestions','faqCategories'));
    }

}
