<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wound extends Model
{
    public $timestamps = true;
    protected $table = 'wounds';
    protected $fillable = [
        'case_id',
        'site',
        'status',
        'original_image',
    ];

    public function progress()
    {
        $this->hasMany('App\Progress');
    }
}
