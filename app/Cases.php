<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    public $timestamps = true;
    protected $table = 'cases';
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'disease',
        'status',
        'next_appointment',
    ];

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    public function wounds()
    {
        return $this->hasMany('App\Wound');
    }
}
