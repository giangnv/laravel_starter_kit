<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Ixudra\Curl\Facades\Curl;

/**
 * Class EmailParserController.
 */
class EmailParserController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.emailparser');
    }

    public function parser(Request $request)
    {
        $emailContent = $request->input('email');
        $response = Curl::to(config('settings.email_api_host') . 'email')
            ->withData(
                [
                    'email' => $emailContent
                ]
            )
            ->post();

        return response()->json([
            'status' => 200,
            'success' => 1,
            'result' => json_decode($response)
        ]);
    }

    public function feedback(Request $request)
    {
        $emailContent = $request->input('email');
        $fb = $request->input('fb');
        $response = Curl::to(config('settings.email_api_host') . 'fb')
            ->withData(
                [
                    'email' => $emailContent,
                    'fb' => $fb,
                ]
            )
            // ->asJson()
            ->post();
        
        return response()->json([
            'status' => 200,
            'success' => 1,
            'result' => $response
        ]);
    }
}
