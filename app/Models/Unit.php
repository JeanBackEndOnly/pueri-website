<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Unit extends Model
{
    protected $table = 'unit';
    protected $fillable = [
        'unit_name',
        'unit_code',
        'unit_description',
        'unit_image'
    ];
    public function employee(){
        return $this->hasMany(Employee::class);
    }
}
