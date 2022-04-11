<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use YouTube\YouTubeDownloader;
use YouTube\Exception\YouTubeException;



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
            //need to make helper function to filter only audio links, maybe set up a class

            //return view('download', compact('downloadOptions'));
            dd($youtube->getVideoInfo($youtubeUrl)); 
        } catch (YouTubeException $e) {
            return redirect('/');
        }

    }
    public function goback() {
        return redirect('/');
    }
}
