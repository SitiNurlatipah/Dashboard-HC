<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MppModel extends Model
{
    protected $table = 'mpp_employees';
    protected $fillable = [];
    protected $guarded = ['id'];
	protected $primaryKey = 'id';
}
