@extends('layouts.master')

@section('content')
    <form action="/download" method="post">
        @csrf
        <div class="input-container">
            <input type="text" name="url" placeholder="Enter Youtube Link e.g https://www.youtube.com/watch?v=dQw4w9WgXcQ" required id="url">
            <button type="submit"> GET </button>
        </div>
        
    </form>
@endsection