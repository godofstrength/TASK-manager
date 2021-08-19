<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'photo'];
// many companies can  belong to a single user
    public function users(){
        return $this->belongsToMany('App\Models\User', 'company_users', 'user_id', 'company_id');
    }
    // a company can have multiple departments
    public function departments(){
        return $this->hasMany('App\Models\Department');
    }
}
