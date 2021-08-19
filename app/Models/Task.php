<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['task_name', 'module_id', 'status', 'deadline', 'members'];

    public function module(){
        return $this->belongsTo('App\Models\Module');
    }
}
