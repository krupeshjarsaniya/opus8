<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class IndustryController extends Controller
{
    public function industry(Request $request)
    {
        $data = $this->load_agents_industry($request);
        return view('industry.industry')->with($data);
    }

    public function load_agents_industry(Request $request)
    {
        $data['agentsIndustry'] = Agent::with('industry')->paginate(5);
        $data['show_loadmore'] = false;
        if ($data['agentsIndustry']->lastPage() !== $data['agentsIndustry']->currentPage()) {
            $data['show_loadmore'] = true;
        }
        $data['html'] = view('ajax.ajax-industry', $data)->render();
        unset($data['agentsIndustry']);
        if ($request->ajax()) {
            $data['status'] = true;
            return response()->json($data);
        }
        return $data;
    }

    public function industryChart($id)
    {
        try {

            $id = Crypt::decryptString($id);
            $agent = Industry::where('agent_id',$id)->with('agent')->first();
            if (!$agent) {
                return redirect('/industry')->with('error', 'No data founds');
            }

            $agentArray = array();
            $agentArray[] = intval($agent->health_care);
            $agentArray[] = intval($agent->IT);
            $agentArray[] = intval($agent->hospitality);
            $agentArray[] = intval($agent->finance);
            $agentArray[] = intval($agent->industrial);
            $agentImage = $agent;
            return view('industry.industry_chart')->with(['agent'=>$agentArray,'agentImage'=>$agentImage]);
        } catch (\Throwable $th) {
            return redirect('/industry')->with('error', 'No Agent founds');
        }
    }

    public function submit_agents_industry(Request $request)
    {
        try {

            $agent = Industry::where('agent_id',$request->agent_id)->first();
            if(empty($agent))
            {
                $input = $request->only(["agent_id","health_care","IT", "gas_oil", "hospitality","logistics","construction","industrial","finance"]);
                $bill = Industry::create($input);

                if($bill)
                {
                    return response()->json(["", "message" => "Agent industry added successfully..."], 200);
                }
                else
                {
                    return response()->json(["message" => "Error while adding agent..."], 500);
                }
            }
            else
            {
                $input = $request->only(["health_care","IT", "gas_oil", "hospitality","logistics","construction","industrial","finance"]);
                $billinfo = Industry::where('agent_id',$request->agent_id)->first();
                $billinfo->update($input);
                return response()->json(["", "message" => "Agent industry update successfully..."], 200);
            }

        } catch (\Throwable $th) {
            return response()->json(["message" => "Error while adding agent..." . $e->getMessage()], 500);
        }
    }
}
