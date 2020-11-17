<?php

namespace App\Http\Controllers;

use App\Jobs\ConvertVideoForStreaming;
use App\Models\VideoTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BaseController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function videoTest()
    {
        /**
         * Show the videoTest view
         */
        $video = VideoTest::first();
        return view('videoTest')->with(compact('video'));
    }
    public function uploadVideoTest(Request $request)
    {
        /**
         * Upload videoTest
         */
        /**
         * The ResumableJS library sends first a GET request to check if the chunk exists, it then sends a POST request if the chunk
         * does not exist, this way, we can ensure the video upload starts from the last uploaded chunk 
         */
        if ($request->isMethod('GET')) {
            /**
             * If it's a GET request, check if the chunk uploaded already exists
             */
            if (!($request->resumableChunkNumber && trim($request->resumableIdentifier) != '')) {
                $request->resumableIdentifier = '';
            }
            $temp_dir = 'public/uploads/temp/' . $request->resumableIdentifier;
            if (!($request->resumableFilename && trim($request->resumableFilename) != '')) {
                $request->resumableFilename = '';
            }
            if (!($request->resumableChunkNumber && trim($request->resumableChunkNumber) != '')) {
                $request->resumableChunkNumber = '';
            }
            $chunk_file = $temp_dir . '/' . $request->resumableFilename . '.part' . $request->resumableChunkNumber;
            if (Storage::exists($chunk_file)) {
                return response()->json([], 200);
            } else {
                return response()->json([], 404);
            }
        } else {
            /**
             * If it's a POST request, that means the previous get request returned a 404 code, the chunk does not exist
             * We have to upload it
             */
            if (isset($request->resumableIdentifier) && trim($request->resumableIdentifier) != '') {
                $temp_dir = 'public/uploads/temp/' . $request->resumableIdentifier;
            }
            $dest_file = $temp_dir . '/' . $request->resumableFilename . '.part' . $request->resumableChunkNumber;
            if (!is_dir(storage_path() . '/app/' . $temp_dir)) {
                mkdir(storage_path() . '/app/' . $temp_dir, 0777, true);
            }
            if (!move_uploaded_file($request->file('file'), storage_path() . '/app/' . $dest_file)) {
                abort(500);
            } else {
                $finalFilename = Str::random(16) . '.' . $request->file->getClientOriginalExtension();
                return $this->createFileFromChunks($temp_dir, $request->resumableFilename, $request->resumableChunkSize, $request->resumableTotalSize, $request->resumableTotalChunks, $finalFilename);
               
            }
        }
    }
    private function createFileFromChunks($temp_dir, $fileName, $chunk_size, $totalSize, $total_files, $finaleFilename)
    {
        // count all the parts of this file
        $total_files_on_server_size = 0;
        $temp_total = 0;
        if (Storage::exists($temp_dir)) {
            foreach (scandir(storage_path() . '/app/' . $temp_dir) as $file) {
                $temp_total = $total_files_on_server_size;
                $tempfilesize = filesize(storage_path() . '/app/' . $temp_dir . '/' . $file);
                $total_files_on_server_size = $temp_total + $tempfilesize;
            }
        }
        // check that all the parts are present
        // If the Size of all the chunks on the server is equal to the size of the file uploaded.
        if ($total_files_on_server_size >= $totalSize) {
            // create the final destination file
            $path = storage_path() . '/app/public/uploads/' . $finaleFilename;
            if (($fp = fopen($path, 'w')) !== false) {
                for ($i = 1; $i <= $total_files; $i++) {
                    fwrite($fp, file_get_contents(storage_path() . '/app/' . $temp_dir . '/' . $fileName . '.part' . $i));
                }
                fclose($fp);
            } else {
                abort(500);
                return false;
            }

            // rename the temporary directory (to avoid access from other
            // concurrent chunks uploads) and than delete it
            if (Storage::rename($temp_dir, $temp_dir . '_UNUSED')) {
                Storage::deleteDirectory($temp_dir . '_UNUSED');
            } else {
                Storage::deleteDirectory($temp_dir);
            }
            
            /**
             * We want to keep one entry in video_tests table for testing purpose
             */
            VideoTest::truncate();
            $video = VideoTest::create([
                'original_name' => request()->file->getClientOriginalName(),
                'real_path' => $finaleFilename,
            ]);
            
            /** 
             * We then dispatch the video compressing/conversion job
             */
            ConvertVideoForStreaming::dispatch($video);
            return response()->json([
                'message' => 'La vidéo à été uploadé avec succès, veuillez revenir dans quelques minutes en attendant que sa conversion/compression soit effectué',
            ], 200);
        }
        return response()->json([

        ], 200);
    }
}
