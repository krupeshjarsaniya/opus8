<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Signup;
use App\Models\User;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function signup(Request $request)
    {
        // $agents = Agent::where('id', '!=', 0)->with('signup')->get();
        // return view('auth.signup',compact('agents'));
        $data = $this->signupLoadmore($request);
        return view('auth.signup')->with($data);
    }

    public function signupLoadmore(Request $request)
    {
        $data['agentSignup'] = Agent::with('signup')->paginate(5);
        $data['show_loadmore'] = false;
        if ($data['agentSignup']->lastPage() !== $data['agentSignup']->currentPage()) {
            $data['show_loadmore'] = true;
        }
        $data['html'] = view('ajax.ajax-singup', $data)->render();
        unset($data['agentSignup']);
        if ($request->ajax()) {
            $data['status'] = true;
            return response()->json($data);
        }
        return $data;
    }

    public function signupStore(Request $request)
    {
        // dd($request->all());
        // $validator = Validator::make($request->all(), [
        //     'average_close_out' => 'required',
        //     'agent' => 'required',
        // ],
        // [
        //     'average_close_out.required'=> "Average close out required",
        //     'agent.required'=> "Agent required",
        // ]);

        // if ($validator->fails())
        // {
        //     $error=json_decode($validator->errors());
        //     return response()->json(['status' => 401,'error1' => $error]);
        //     exit();
        // }

        $signupCheck = Signup::where('agent_id',$request->agentId)->first();
        if (!empty($signupCheck)) {
            $signupArray = array(
                'average_close_out' => $request->average_close_out,
                'agent' => $request->agent,
            );

            Signup::where('agent_id', $request->agentId)->update($signupArray);
        } else {

            $signupArray = array(
                'agent_id' => $request->agentId,
                'average_close_out' => $request->average_close_out,
                'agent' => $request->agent,
            );
            Signup::create($signupArray);
        }

        $redirect = route('signup');
        $data = ['title' => "signup", 'message' => "signup create successfully", 'type' => 'success'];
        return response()->json(['status' => 1,'data' => $data, 'redirect' => $redirect]);
    }

    public function signupChart()
    {
        return view('auth.signup-chart');
    }
}
