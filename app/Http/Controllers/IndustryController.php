<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndustryController extends Controller
{
    public function industry()
    {
        return view('industry.industry');
    }

    public function industryChart()
    {
        return view('industry.industry_chart');
    }
}
