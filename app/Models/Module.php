<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $fillable = ['module_name', 'project_id'];

    public function project(){
        return $this->belongsTo('App\Models\Project');
    }
    public function tasks(){
        return $this->hasMany('App\Models\Task');
    }
}
