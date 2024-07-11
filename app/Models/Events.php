<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
   protected $fillable =[
   'organizer_id',
   'title',
   'start time',
   'description',
   'image_path',
   'end time',
   'video_stream_url',
   'capacity'];
    use HasFactory;
}
