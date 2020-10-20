<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoTest extends Model
{
    protected $dates = [
        'converted_at'
    ];
    protected $guarded = [];
    use HasFactory;
}
