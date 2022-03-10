<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeeklyBillingController extends Controller
{
    public function billForm()
    {
        return view('weekly_billing.bill_form');
    }
    public function billChart()
    {
        return view('weekly_billing.bill_chart');
    }
}
