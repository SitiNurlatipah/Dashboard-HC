<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesYtdModel extends Model
{
    protected $table = 'sales_ytd';
	public $timestamps = true;
	protected $guarded = ['idYtd'];
	protected $primaryKey = 'idYtd';
}
