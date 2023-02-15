<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BSCLearnGrowthModel extends Model
{
    protected $table = 'bsc_learn';
	public $timestamps = true;
	protected $guarded = ['idlearngrowth'];
	protected $primaryKey = 'idlearngrowth';
}
