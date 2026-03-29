<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workexp extends Model
{
    protected $table = 'workexp';
    protected $fillable = [
        'form_id',
        'position',
        'years',
        'company_name',
        'company_address',
        'company_contact'
    ];
    
    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}