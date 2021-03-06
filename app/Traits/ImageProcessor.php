<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

trait ImageProcessor{
  private function generateImageName(){
      do{
        $new_name = Str::random(20);
        $full_path = config('filesystems.profile_photos_path').$new_name.'.jpg';
      }while(Storage::disk('public')->exists($full_path));
      return $full_path;
  }
  private function processImage($image, $encode='jpg'){
    $resize = Image::make($image)->fit(170)->encode($encode);
    $full_path = $this->generateImageName();
    $save =  Storage::disk('public')->put($full_path, $resize->__ToString());
    if($save) {
      return $full_path;
    }
    return false;
  }
}