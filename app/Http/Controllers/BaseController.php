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
        $video = VideoTest::first();
        return view('videoTest')->with(compact('video'));
    }
    public function uploadVideoTest(Request $request){
        $request->validate([
            'file' => 'mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
        ]);
        $path = Str::random(16).'.'.$request->file->getClientOriginalExtension();
        $request->file->storeAs('public/uploads', $path);
        VideoTest::truncate();
        $video = VideoTest::create([
            'original_name' => $request->file->getClientOriginalName(),
            'real_path' => $path,
        ]);
        ConvertVideoForStreaming::dispatch($video);
        return response()->json([
            'message' => 'La vidéo à été uploadé avec succès, veuillez revenir dans quelques minutes en attendant que sa conversion/compression soit effectué'
        ]);

    }
}
