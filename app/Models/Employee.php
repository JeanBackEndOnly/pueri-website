<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;


class Employee extends Model
{
    protected $table = 'employee';
    protected $fillable = [
        'unit_id',
        'fname',
        'mname',
        'lname',
        'suffix',
        'email',
        'contact',
        'profile',
        'position',
        'about',
        'joined_at',
        'time_available'
    ];

    public function unit(){
        return $this->belongsTo(Unit::class);    
    }
}
