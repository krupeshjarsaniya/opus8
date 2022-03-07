<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentRequest;
use App\Models\Agent;
use App\Models\AgentSongs;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AgentController extends Controller
{

    public function __construct()
    {
        $this->moduleRoute = url('/agent');
        View::share('module_route', $this->moduleRoute);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $this->load_agents($request);
        return view('agent-list')->with($data);
    }

    public function load_agents(Request $request)
    {
        $data['agents'] = Agent::paginate(5);
        $data['show_loadmore'] = false;
        if ($data['agents']->lastPage() !== $data['agents']->currentPage()) {
            $data['show_loadmore'] = true;
        }
        $data['html'] = view('ajax.ajax-agents', $data)->render();
        unset($data['agents']);
        if ($request->ajax()) {
            $data['status'] = true;
            return response()->json($data);
        }
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agent-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgentRequest $request)
    {
        $songs = $request->file('songs');
        $profile_pic = $request->file('profile_pic');
        $input = $request->only(['email', 'first_name', 'last_name', 'sales_type', 'sales_percentage']);

        try {
            $path = config('remedy.PATH.profiles_pic');
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }
            $name = strtotime("now") . mt_rand(0, 999999) . " - " . $profile_pic->getClientOriginalName();
            $profile_pic->move($path, $name);

            $input['profile_img'] = $name;
            $agent = Agent::create($input);
            if ($agent) {
                $path = config('remedy.PATH.songs');
                if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                }
                $agent_songs['agent_id'] = $agent->id;
                foreach ($songs as $song) {
                    $name = strtotime("now") . mt_rand(0, 999999) . " - " . $song->getClientOriginalName();
                    $song->move($path, $name);
                    $agent_songs['song_name'] = $name;
                    AgentSongs::create($agent_songs);
                }
                return response()->json(["", "message" => "Agent added successfully..."], 200);
            } else {
                return response()->json(["message" => "Error while adding agent..."], 500);
            }
        } catch (Exception $e) {
            return response()->json(["message" => "Error while adding agent..." . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agent = Agent::find($id);
        if (!$agent) {
            return redirect('/')->with('error', 'No Agent founds');
        }
        $data['agent_info'] = $agent;
        return view('agent-preview', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent = Agent::find($id);
        if (!$agent) {
            return redirect('/')->with('error', 'No Agent founds');
        }
        $data['agent_info'] = $agent;
        return view('agent-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'email' => ['required', 'string'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'sales_type' => ['required', 'string'],
            'sales_percentage' => ['required', 'int'],
        ]);
        $input = $request->only(['email', 'first_name', 'last_name', 'sales_type', 'sales_percentage']);
        try {
            $agent_info = Agent::where('id', $id)->first();
            if (!$agent_info) {
                return response()->json(["message" => "No agent founds..."], 400);
            }
            if ($request->hasFile('profile_pic')) {
                $profile_pic = $request->file('profile_pic');
                $path = config('remedy.PATH.profiles_pic');
                if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                }
                $name = strtotime("now") . mt_rand(0, 999999) . " - " . $profile_pic->getClientOriginalName();
                $profile_pic->move($path, $name);
                $input['profile_img'] = $name;
            }
            $agent_info->update($input);
            if ($request->hasFile('songs')) {
                $songs = $request->file('songs');
                $path = config('remedy.PATH.songs');

                $agent_old_songs = AgentSongs::where('agent_id', $id)->get();
                if ($agent_old_songs) {
                    foreach ($agent_old_songs as $agent_old_song) {
                        $song_name = $agent_old_song->song_name;
                        $file = $path . '/' . $song_name;
                        if (file_exists($file)) {
                            unlink($file);
                        }
                        AgentSongs::find($agent_old_song->id)->delete();
                    }
                }

                if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                }
                $agent_songs['agent_id'] = $id;
                foreach ($songs as $song) {
                    $name = strtotime("now") . mt_rand(0, 999999) . " - " . $song->getClientOriginalName();
                    $song->move($path, $name);
                    $agent_songs['song_name'] = $name;
                    AgentSongs::create($agent_songs);
                }
            }
            return response()->json(["message" => "Agent updated successfully..."], 200);
        } catch (Exception $e) {
            return response()->json(["message" => "Error while updating agent..." . $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agent = Agent::where("id", $id)->first();
        if ($agent) {
            $path = config('remedy.PATH.songs');
            $agent_songs = AgentSongs::where('agent_id', $id)->get();
            if ($agent_songs) {
                foreach ($agent_songs as $agent_song) {
                    $song_name = $agent_song->song_name;
                    $file = $path . '/' . $song_name;
                    if (file_exists($file)) {
                        unlink($file);
                    }
                }
            }
            $path = config('remedy.PATH.profiles_pic');
            $profile_pic = $agent->profile_img;
            $profile_pic_file = $path . '/' . $profile_pic;
            if (file_exists($profile_pic_file)) {
                unlink($profile_pic_file);
            }
            Agent::destroy($id);
            return response()->json(["message" => "Agent deleted successfully..", 200]);
        }
        return response()->json(["message" => "Error while deleting agent..", 500]);
    }

    public function deleteSong($agent_id, $song_id)
    {
        $agent_song = AgentSongs::where("id", $song_id)->where("agent_id", $agent_id)->first();
        if ($agent_song) {
            $path = config('remedy.PATH.songs');
            $song_name = $agent_song->song_name;
            $file = $path . '/' . $song_name;
            if (file_exists($file)) {
                unlink($file);
            }
            AgentSongs::destroy($song_id);
            return response()->json(["message" => "Song deleted successfully..", 200]);
        }
        return response()->json(["message" => "Error while deleting song..", 500]);
    }
}
