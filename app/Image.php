<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = true;
    protected $table = 'images';
    protected $fillable = [
        'name',
        'mime',
        'original_name',
    ];
}
