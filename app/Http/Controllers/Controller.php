<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
        $data = [];
        $data['title'] = "Laravel Test";
        return view('pages.home', ['data' => $data]);
    }

    public function getpodcastData() {
        $url = 'https://itunes.apple.com/search?term=' . urlencode('2pac') . "&limit=5";
        $result = file_get_contents($url);
        if ($result !== false) {
            echo json_encode(['status' => 1, 'data' => $result]);
        }
        echo json_encode(['status' => 1]);
    }

}
