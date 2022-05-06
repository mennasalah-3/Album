<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image', 'album_id'];
    public $timestamps = false;

    //relations start
    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
