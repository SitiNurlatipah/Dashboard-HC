<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesModel extends Model
{
    protected $table = 'sales';
	public $timestamps = true;
	protected $guarded = ['idMtd'];
	protected $primaryKey = 'idMtd';
}
