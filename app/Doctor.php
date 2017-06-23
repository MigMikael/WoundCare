<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public $timestamps = true;
    protected $table = 'doctors';
    protected $fillable = [
        'name',
        'email',
        'status',
        'expert',
        'profile_image',
        'password',
        'token',
    ];

    protected $hidden = [
        'password',
        'token'
    ];

    public function cases()
    {
        return $this->hasMany('App\Cases');
    }
}
