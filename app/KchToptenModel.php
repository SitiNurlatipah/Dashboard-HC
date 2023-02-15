<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KchToptenModel extends Model
{
    protected $table = 'kch_topten';
    protected $fillable = [];
    protected $guarded = ['idkchtopten'];
	protected $primaryKey = 'idkchtopten';
}
