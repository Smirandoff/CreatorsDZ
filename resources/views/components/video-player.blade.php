<div class="section-padding mb-4">
  <video id="{{$id}}" class="video-js {{$theme ? 'vjs-theme-'.$theme : 'vjs-default-skin'}} vjs-big-play-centered"
    controls preload="auto" width="{{$width}}" height="{{$height}}">
    <p class="vjs-no-js">
      Pour regarder cette vidéo, vous devez activer javascript et avoir un navigateur qui
      <a href="https://videojs.com/html5-video-support/" target="_blank">supporte les videos HTML5</a>
    </p>
  </video>
</div>
@push('styles')
<link href="https://vjs.zencdn.net/7.8.4/video-js.css" rel="stylesheet" />
@if($theme)
<link href="https://unpkg.com/@videojs/themes@1/dist/{{$theme}}/index.css" rel="stylesheet">
@endif
<link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/videojs-resolution-switcher-vjs7@1.0.0/videojs-resolution-switcher.css">
@endpush
@push('scripts')
<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
<script src="https://vjs.zencdn.net/7.8.4/video.js"></script>
<script src="https://cdn.jsdelivr.net/npm/videojs-resolution-switcher-vjs7@1.0.0/videojs-resolution-switcher.js">
</script>
<script>
  videojs('{{$id}}', {
      controls: true,
      plugins: {
          videoJsResolutionSwitcher: {
            default: '360',
            dynamicLabel: true
          }
        }
    }, function(){
      // Add dynamically sources via updateSrc method
      var player = this;
      player.updateSrc([
          @if($source360)
          {
            src: '{{$source360}}',
            type: 'video/mp4',
            label: '360'
          },
          @endif
          @if($source480)
          {
            src: '{{$source480}}',
            type: 'video/mp4',
            label: '480'
          },
          @endif
          @if($source720)
          {
            src: '{{$source720}}',
            type: 'video/mp4',
            label: '720'
          },
          @endif
        ])
      });
</script>
@endpush