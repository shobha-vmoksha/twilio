<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable=['name','phone_number','email','password'];
    protected $softDelete = true;


    public function admin(){
        return $this->belongsTo('App\Model\User');
    }

}
