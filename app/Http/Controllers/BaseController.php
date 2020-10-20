<?php

namespace App\Http\Controllers;

use App\Jobs\ConvertVideoForStreaming;
use App\Models\VideoTest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BaseController extends Controller
{
    public function index(){
        return view('index'); 
    }
    public function videoTest(){
        return view('videoTest');
    }
    public function uploadVideoTest(Request $request){
        $request->validate([
            'video' => 'mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
        ]);
        $path = Str::random(16).'.'.$request->video->getClientOriginalExtension();
        $request->video->storeAs('public/uploads', $path);
        VideoTest::delete();
        $video = VideoTest::create([
            'original_name' => $request->video->getClientOriginalName(),
            'real_path' => $path,
        ]);
        ConvertVideoForStreaming::dispatch($video);
        return redirect('/uploader')
            ->with(
                'message',
                'Votre video sera disponible sous peu'
            );

    }
}
