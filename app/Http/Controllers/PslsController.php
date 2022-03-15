<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Psls;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PslsController extends Controller
{
    public function psls(Request $request)
    {
        $data = $this->load_agents_psls($request);
        return view('psls.psls')->with($data);
        // $agents = Agent::where('id', '!=', 0)->with('psls')->get();
        // return view('psls.psls', compact('agents'));
    }

    public function load_agents_psls(Request $request)
    {
        $data['agentsPsls'] = Agent::with('psls')->paginate(5);
        $data['show_loadmore'] = false;
        if ($data['agentsPsls']->lastPage() !== $data['agentsPsls']->currentPage()) {
            $data['show_loadmore'] = true;
        }
        $data['html'] = view('ajax.ajax-psls', $data)->render();
        unset($data['agentsPsls']);
        if ($request->ajax()) {
            $data['status'] = true;
            return response()->json($data);
        }
        return $data;
    }

    public function pslsStore(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'new_on_board' => 'required',
        //     'sector' => 'required',
        //     'company' => 'required',
        // ],
        // [
        //     'new_on_board.required'=> "New On Board id required",
        //     'sector.required'=> "Sector id required",
        //     'company.required'=> "Company id required",
        // ]);

        // if ($validator->fails())
        // {
        //     $error=json_decode($validator->errors());
        //     return response()->json(['status' => 401,'error1' => $error]);
        //     exit();
        // }

        $pslscheck = Psls::where('agent_id',$request->agentId)->first();
        $psls = array(
            'agent_id' => $request->agent_id,
            'new_on_board' => $request->new_on_board,
            'sector' => $request->sector,
            'company' => $request->company,
        );

        if (!empty($pslscheck)) {
            Psls::where('agent_id', $request->agentId)->update($psls);
        } else {
            Psls::create($psls);
        }

        $redirect = route('psls');
        $data = ['title' => "Psls", 'message' => "Psls create successfully", 'type' => 'success'];
        return response()->json(['status' => 1,'data' => $data, 'redirect' => $redirect]);
    }

    public function pslsAgentChart($agentId)
    {
        // dd($agentId);
        return view('psls.agent-chart');
    }

    


}
