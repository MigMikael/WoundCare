<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public $timestamps = true;
    protected $table = 'patients';
    protected $fillable = [
        'name',
        'gender',
        'birthday',
        'address',
        'phone_number',
        'congenital_disease',
        'allergic',
        'status',
        'profile_image',
        'username',
        'password',
        'token',
    ];

    protected $hidden = [
        'username',
        'password',
        'token'
    ];

    public function cases()
    {
        $this->hasMany('App\Cases');
    }
}
