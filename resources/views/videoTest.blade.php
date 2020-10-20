@extends('layout.layout')

@section('title', 'Test videoJS')

@section('content')
<div class="section-padding mb-4">
  <x-video-player source360="https://file-examples-com.github.io/uploads/2017/04/file_example_MP4_480_1_5MG.mp4" source480="http://media.xiph.org/mango/tears_of_steel_1080p.webm"></x-video-player>
</div>
@endsection