<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'department_id'];

    public function department(){
        return $this->belongsTo('App\Models\Department');
    }
    public function modules(){
        return $this->hasMany('App\Models\Module');
    }
}
