@extends('layouts.master')

@section('content')
    <h3 class='content-bold'>{{$videoTitle}}</h3>
    <div class="text-box">
        <p class="content">To download, right click on the link and save the file. Or just click
            it if you want to play it on browser
        </p>
    </div>
    <a href="{{$audios[0]->url}}" target="blank"><button class='btn-center'>Mp4a</button></a>
    <a href="{{$audios[1]->url}}" target="blank"><button class='btn-center'>WebM</button></a>
@endsection