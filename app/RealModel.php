<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RealModel extends Model
{
    protected $table = 'real_employees';
	public $timestamps = true;
	protected $primaryKey = 'idReal';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['idReal'];
	
	
	
	
}
