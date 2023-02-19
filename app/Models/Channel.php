<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Channel extends Model implements HasMedia {
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['title', 'link_youtube', 'ispublish', 'cover'];
    // public function user() {
    //     return $this->belongsTo(user::class);
    // }
}