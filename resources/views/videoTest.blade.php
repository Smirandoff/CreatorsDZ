@extends('layout.layout')

@section('title', 'Test videoJS')

@section('content')

@if(session()->has('success'))
<div class="alert alert-success mb-4" role="alert">
  {{session()->get('success')}}
</div>
@endif

<x-video-player source360="https://file-examples-com.github.io/uploads/2017/04/file_example_MP4_480_1_5MG.mp4"
  source480="http://media.xiph.org/mango/tears_of_steel_1080p.webm" class="mb-4  "></x-video-player>

<form action="{{route('test.upload')}}" method="POST" enctype="multipart/form-data" class="mb-4">
  @csrf
  <div class="form-group">
    <label for="newVideo">Nouvelle video</label>
    <input type="file" class="form-control-file" name="video" id="newVideo" placeholder=""
      aria-describedby="fileHelpId">
  </div>
  <div class="form-group">
    <button type="submit">Confirmer</button>
  </div>
</form>
@endsection