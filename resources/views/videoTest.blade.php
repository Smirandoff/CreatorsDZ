@extends('layout.layout')

@section('title', 'Test videoJS')

@section('content')
<div class="alert alert-success" role="alert" id="uploadSuccess" style="display:none;">

</div>
<x-video-player
  source360="{{$video && $video->src_360 ? $video->src_360 : 'https://file-examples-com.github.io/uploads/2017/04/file_example_MP4_480_1_5MG.mp4'}}"
  source480="{{$video && $video->src_480 ? $video->src_480 : 'http://media.xiph.org/mango/tears_of_steel_1080p.webm'}}"
  source720="{{ $video && $video->src_720 ? $video->src_720 : null}}" class="mb-4"></x-video-player>

<progress id="uploadProgress" value="0" max="100" style="display:none;"></progress>
<div id="myAwesomeDropzone"
  style="width: 50%; height:300px; font-size:25px; display:flex; justify-content:center; align-items:center; border:1px solid black; text-align:center; margin:auto;">
  <span class="dz-default dz-message">cliquez ici pour uploader une nouvelle vidéo <br> ou glissez déposez la vidéo
    ici</span>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>
<script>
  $(function(){
    var r = new Resumable({
      target:'/upload-video-test', 
      maxFiles: 1,
      headers: {
        'X-CSRF-Token' : "{{csrf_token()}}",
        'X-Requested-With': 'XMLHttpRequest'
      }
    });
    // Resumable.js isn't supported, fall back on a different method
    if(!r.support){
      
    }
    else {
      r.assignBrowse($("#myAwesomeDropzone"));
      r.assignDrop($("#myAwesomeDropzone"));
      r.on('fileAdded', function(file){
        $("#uploadProgress").show();
        r.upload();
      });
      r.on('fileProgress', function(file){
        $("#uploadProgress").val(r.progress() * 100);
      })
    }
  }); 
</script>
@endpush
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/basic.min.css">
@endpush