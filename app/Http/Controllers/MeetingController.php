<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Agent;
use App\Models\Industry;

class MeetingController extends Controller
{
    public function meetingChart($id)
    {
        $id = Crypt::decryptString($id);
            $agent = Industry::where('agent_id',$id)->with('agent')->first();
            if (!$agent) {
                return redirect('/industry')->with('error', 'No data founds');
            }

            $agentArray = array();
            $agentArray[] = intval($agent->industrial);
            $agentArray[] = intval($agent->health_care);
            $agentArray[] = intval($agent->gas_oil);
            $agentArray[] = intval($agent->hospitality);
            $agentArray[] = intval($agent->logistics);
            $agentArray[] = intval($agent->finance);
            $agentImage = $agent;
        return view('meeting-frontend-chart')->with(['agent'=>$agentArray,'agentImage'=>$agentImage]);
    }
}
