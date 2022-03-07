<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('/agent');
        }
        return redirect('/login');
    }

    public function agent_zoho_preview()
    {
        try {
            $client = new Client();
            $response = $client->get('http://51.77.118.72/zoho-3.0/sample.php');
            $body = $response->getBody()->getContents();
            $agent_info = "";
            if ($body) {
                $body = json_decode($body);
                $response_data = $body->data;
                if ($body->results && !empty($response_data)) {
                    $agent_info = Agent::where("email", $response_data->email)->first();
                }
                if ($agent_info) {
                    $data['agent_info'] = $agent_info;
                    $data['agent_info']['fee'] = $response_data->fee;
                    $data['agent_info']['stage'] = $response_data->stage;
                    $data['agent_info']['products'] = $response_data->products;
                    $data['agent_info']['owner'] = $response_data->owner;
                    return view('agent-zoho-preview')->with($data);
                } else {
                    // $gifUrls = [
                    //     asset('assets/images/zoho_preview/0d1db841bf3e9a99f1faec071a5ffdab.jpg'),
                    //     asset('assets/images/zoho_preview/1ef48e3d14fd8ffa27f39a60acfbd37e.jpg'),
                    //     asset('assets/images/zoho_preview/4cc8f0499dd7662900ef7c01d53bad50.jpg'),
                    //     asset('assets/images/zoho_preview/5eeb2bd295747dc9b331a7b254187ed0.jpg'),
                    //     asset('assets/images/zoho_preview/6c5e618462e2efceb5660e9f3ec73bbb.jpg'),
                    //     asset('assets/images/zoho_preview/8f79d8f32eb555e58dc1d901931128dc.jpg'),
                    //     asset('assets/images/zoho_preview/47dcd143b9338abb34bd4ad623983e20.jpg'),
                    //     asset('assets/images/zoho_preview/0444af19fa76fcb03c60c11f9b9d38e6.jpg'),
                    //     asset('assets/images/zoho_preview/648a99c2bab91d8fa6a9dffeefedaf55.jpg'),
                    //     asset('assets/images/zoho_preview/5333ff66c020ee36d4950b0a31d7c540.jpg'),
                    //     asset('assets/images/zoho_preview/b244965020cbe20e0ec426302db5e7c7.jpg'),
                    //     asset('assets/images/zoho_preview/bcdf9697124972a139b9c915c9fcb6f7.jpg'),
                    //     asset('assets/images/zoho_preview/c5745b6db4e31d6bf9c4b289b110fd32.jpg'),
                    //     asset('assets/images/zoho_preview/d0fe3bd86a5f1837c2a3bacaeefbf3ab.jpg'),
                    //     asset('assets/images/zoho_preview/ff98bd6d328630f2f7f8825325a03a08.jpg'),
                    //     asset('assets/images/zoho_preview/screenshot_2022_02_03_142337.png'),
                    //     asset('assets/images/zoho_preview/screenshot_2022_02_03_142405.png'),
                    //     asset('assets/images/zoho_preview/screenshot_2022_02_03_142550.png'),
                    //     asset('assets/images/zoho_preview/screenshot_2022_02_03_142725.png'),
                    //     asset('assets/images/zoho_preview/imgpsh_fullsize_anim.jpeg'),
                    // ];
                     $gifUrls = [
                        asset('assets/images/Screenshot2022-02-07151453.jpg'),
                    ];
                    $data['message'] = $gifUrls[array_rand($gifUrls)];
                    return view('agent-zoho-preview')->with($data);
                }
            }
        } catch (GuzzleException $e) {
            Log::info("Error while processing request of Zoho API data", $e->getMessage());
            $data['message'] = "Error while processing your request...";
            return view('agent-error')->with($data);
        }
    }
}
