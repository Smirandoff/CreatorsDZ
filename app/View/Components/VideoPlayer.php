<?php

namespace App\View\Components;

use Illuminate\View\Component;

class VideoPlayer extends Component
{
    public $id, $theme, $width, $height, $source360, $source480, $source720;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($source360 = null, $source480 = null, $source720 = null, $theme=null, $id = 'playerNode', $width = 800, $height=600)
    {
        $this->source360 = $source360;
        $this->source480 = $source480;
        $this->source720 = $source720;
        $this->theme = $theme;
        $this->id = $id;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.video-player');
    }
}
