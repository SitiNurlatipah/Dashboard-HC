<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginModel extends Model
{
    protected $table='users_login';
    protected $guarded = ['id'];
    protected $fillable = [
    ];
}
