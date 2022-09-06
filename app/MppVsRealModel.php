<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MppVsRealModel extends Model
{
    protected $table = 'mpp_vs_realization';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];
	protected $dates=['dateBulan'];
	
	
	
}
