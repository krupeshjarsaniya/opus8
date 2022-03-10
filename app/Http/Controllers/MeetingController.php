<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function meetingChart()
    {
        return view('meeting-frontend-chart');
    }
}
