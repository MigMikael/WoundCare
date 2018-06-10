<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    public $timestamps = true;
    protected $table = 'progress';
    protected $fillable = [
        'wound_id',
        'image',
        'area',
        'comment',
        'advice',
        'status',
    ];

    public function wound()
    {
        return $this->belongsTo('App\Wound', 'wound_id');
    }
}
