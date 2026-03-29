<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Form;

class Files extends Model
{
    protected $table = 'files';
    protected $fillable = [
        'form_id',
        'file',
        'file_name'
    ];
    public function form(){
        return $this->belongsTo(Form::class);
    }
}
