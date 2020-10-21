<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class VideoTest extends Model
{
    protected $dates = [
        'converted_at'
    ];
    protected $guarded = [];
    use HasFactory;

    /**
     * Getters
     */
    public function getSrc360Attribute($value){
        return Storage::url($value);
    }
    public function getSrc480Attribute($value){
        return Storage::url($value);
    }
    public function getSrc720Attribute($value){
        return Storage::url($value);
    }
}
