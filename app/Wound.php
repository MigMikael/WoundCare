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
        return $this->hasMany('App\Progress');
    }

    public function cases()
    {
        return $this->belongsTo('App\Cases', 'case_id');
    }
}
