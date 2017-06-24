<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public $timestamps = true;
    protected $table = 'doctors';
    protected $fillable = [
        'user_id',
        'name',
        'status',
        'expert',
        'profile_image',
        'token',
    ];

    protected $hidden = [
        'token'
    ];

    public function cases()
    {
        return $this->hasMany('App\Cases');
    }
}
