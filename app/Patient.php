<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public $timestamps = true;
    protected $table = 'patients';
    protected $fillable = [
        'user_id',
        'name',
        'gender',
        'birthday',
        'address',
        'phone_number',
        'congenital_disease',
        'allergic',
        'status',
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
