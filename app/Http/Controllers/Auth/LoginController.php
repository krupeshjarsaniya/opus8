<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Signup;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/agent';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

	protected function authenticated()
	{
		$authUser = Auth::user();
		// $authUser->update(array('last_login_date' => now()));
		return redirect('/agent');
	}

	public function logout(Request $request)
    {
        $this->guard()->logout();

        // $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return redirect('/');
	}

	protected function guard()
    {
        return Auth::guard('web');
    }

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
        $datas = Agent::get();
        $agent = array();
        foreach($datas as $data)
        {
            $getdata = array(
                'name' => $data->first_name,
                'steps' => intval($data->sales_percentage),
                'href' => $data->getProfilePicAttribute(),
            );
            array_push($agent ,$getdata);
        }
        return view('auth.signup-chart')->with(['agent' => $agent]);
    }

    
}
