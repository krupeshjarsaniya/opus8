<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Billings;
use Illuminate\Http\Request;

class WeeklyBillingController extends Controller
{
    public function billForm(Request $request)
    {
        $data = $this->load_agents_billing($request);
        return view('weekly_billing.bill_form')->with($data);
    }

    public function load_agents_billing(Request $request)
    {
        $data['agentsBill'] = Agent::with('billings')->paginate(5);
        $data['show_loadmore'] = false;
        if ($data['agentsBill']->lastPage() !== $data['agentsBill']->currentPage()) {
            $data['show_loadmore'] = true;
        }
        $data['html'] = view('ajax.ajax-billing', $data)->render();
        unset($data['agentsBill']);
        if ($request->ajax()) {
            $data['status'] = true;
            return response()->json($data);
        }
        return $data;
    }

    public function billChart()
    {
        $data = Billings::with('Agent')->get();

        $billingArray = array();
        foreach($data as $key => $value)
        {
           $bill = array(

            'name' => $value->Agent->first_name,
            'steps' => intval($value->weekly_billing),
            'href' => $value->Agent->getProfilePicAttribute(),
           );

           array_push($billingArray, $bill);
        }
        
        return view('weekly_billing.bill_chart')->with(['billingArray'=>$billingArray]);
        
    }
    
    public function submit_agents_billing(Request $request)
    {
        try {

            $agent = Billings::where('agent_id',$request->agent_id)->first();
            if(empty($agent))
            {
                $input = $request->only(['agent_id','weekly_billing', 'average_close_out']);
                $bill = Billings::create($input);

                if($bill)
                {
                    return response()->json(["", "message" => "Agent weekly billings added successfully..."], 200);
                }
                else
                {
                    return response()->json(["message" => "Error while adding agent..."], 500);
                }
            }
            else
            {
                $input = $request->only(['weekly_billing', 'average_close_out']);
                $billinfo = Billings::where('agent_id',$request->agent_id)->first();
                $billinfo->update($input);
                return response()->json(["", "message" => "Agent weekly billings update successfully..."], 200);
            }

        } catch (\Throwable $th) {
            return response()->json(["message" => "Error while adding agent..." . $e->getMessage()], 500);
        }
    }
}
