<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Utils;
use Hamcrest\Util;
use Illuminate\Http\Request;
use YouTube\YouTubeDownloader;
use YouTube\Exception\YouTubeException;
use YouTube\Models\VideoDetails;

class MainController extends Controller
{
    //
    public function home() {
        return view('home');
    }
    public function download(Request $request) {
        $youtube = new YouTubeDownloader();
        $youtubeUrl = $request['url'];
        try {
            $downloadOptions = $youtube->getDownloadLinks($youtubeUrl);
            $linksCollection = $downloadOptions->getAllFormats();
            //helper to return only webm and an mp4a file
            $audios = Utils::AudioGetter($linksCollection);

            $videoDetails = $downloadOptions->getInfo();
            $videoTitle = $videoDetails->getTitle();
            return view('download', compact('videoTitle', 'audios'));
            //dd($linksCollection, $audioLinks); 
        } catch (YouTubeException $e) {
            return redirect('/');
        }

    }
    public function goback() {
        return redirect('/');
    }
}
