<?php

namespace App\Jobs;

use App\Models\VideoTest;
use FFMpeg\Filters\Video\VideoFilters;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class ConvertVideoForStreaming implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $video;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(VideoTest $video)
    {
        $this->video = $video;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $title360 = 'converted_videos/'.$this->video->real_path.'_360.mp4';
        $title480 = 'converted_videos/'.$this->video->real_path.'_480.mp4';
        $title720 = 'converted_videos/'.$this->video->real_path.'_720.mp4';
        $real_path = 'uploads/'.$this->video->real_path;
        FFMpeg::fromDisk('public')
            ->open($real_path)
            ->addFilter(function(VideoFilters $filters){
                $filters->resize(new \FFMpeg\Coordinate\Dimension(640, 360));
            })
            ->export()
            ->toDisk('public')
            ->inFormat(new \FFMpeg\Format\Video\X264('libmp3lame', 'libx264'))
            ->save($title360);
        FFMpeg::fromDisk('public')
            ->open($real_path)
            ->addFilter(function(VideoFilters $filters){
                $filters->resize(new \FFMpeg\Coordinate\Dimension(854, 480));
            })
            ->export()
            ->toDisk('public')
            ->inFormat(new \FFMpeg\Format\Video\X264('libmp3lame', 'libx264'))
            ->save($title480);
        FFMpeg::fromDisk('public')
            ->open($real_path)
            ->addFilter(function(VideoFilters $filters){
                $filters->resize(new \FFMpeg\Coordinate\Dimension(1280, 720));
            })
            ->export()
            ->toDisk('public')
            ->inFormat(new \FFMpeg\Format\Video\X264('libmp3lame', 'libx264'))
            ->save($title720);
        Storage::disk('public')->delete('uploads/'.$this->video->real_path);
        $this->video->real_path = null;
        $this->video->src_360 = $title360;
        $this->video->src_480 = $title480;
        $this->video->src_720 = $title720;
        $this->video->uploaded_at = now();
        $this->video->save();
    }
}
