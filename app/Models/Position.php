<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Form;

class Position extends Model
{
    protected $table = 'position';
    protected $fillable = [
        'position_name',
        'about_position',
        'available_quantity',
        'availability'
    ];

    public function form(){
        return $this->hasMany(Form::class);
    }
}
