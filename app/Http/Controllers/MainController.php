<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Utils;
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
            //need to make helper function to filter only audio links, maybe set up a class
            $videoDetails = $downloadOptions->getInfo();
            $videoTitle = $videoDetails->getTitle();
            //return view('download', compact('downloadOptions'));
            dd($linksCollection); 
        } catch (YouTubeException $e) {
            return redirect('/');
        }

    }
    public function goback() {
        return redirect('/');
    }
}
