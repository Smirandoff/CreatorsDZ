@extends('layout.layout')

@section('title', 'Test videoJS')

@section('content')
<div class="alert alert-success" role="alert" id="uploadSuccess" style="display:none;">
   
</div>
<x-video-player
  source360="{{$video && $video->src_360 ? $video->src_360 : 'https://file-examples-com.github.io/uploads/2017/04/file_example_MP4_480_1_5MG.mp4'}}"
  source480="{{$video && $video->src_480 ? $video->src_480 : 'http://media.xiph.org/mango/tears_of_steel_1080p.webm'}}"
  source720="{{ $video && $video->src_720 ? $video->src_720 : null}}" class="mb-4"></x-video-player>

<div id="myAwesomeDropzone"
  style="width: 50%; height:300px; font-size:25px; display:flex; justify-content:center; align-items:center; border:1px solid black; text-align:center; margin:auto;">
  <span class="dz-default dz-message">cliquez ici pour uploader une nouvelle vidéo <br> ou glissez déposez la vidéo
    ici</span>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
<script>
  $(function(){
    Dropzone.autoDiscover = false;
    var dropzone = $("#myAwesomeDropzone").dropzone({
    url: "{{route('test.upload')}}",
    headers: {
        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
    },
    init: function(){
      this.on('success', function(file, response){
        $("#uploadSuccess").text(response.message);
        $("#uploadSuccess").show()
        window.scrollTo(0, 0);
    })
    }
}); 
  }); 
</script>
@endpush
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/basic.min.css">
@endpush