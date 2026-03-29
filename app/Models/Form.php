<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Files;
use App\Models\Workexp;
use App\Models\Position;

class Form extends Model
{
    protected $table = 'form';
    protected $fillable = [
        'position_id',
        'fname',
        'mname',
        'lname',
        'suffix',
        'email',
        'contact',
        'address',
        'sex'
    ];
    public function position(){
        return $this->belongsTo(Position::class);
    }
    public function files(){
        return $this->hasMany(Files::class);
    }
    public function workExperiences(){
        return $this->hasMany(Workexp::class);
    }
}
