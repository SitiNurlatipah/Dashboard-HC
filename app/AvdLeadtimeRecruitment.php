<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvdLeadtimeRecruitment extends Model
{
    protected $table = 'avg_recruitments';
	public $timestamps = true;
	// protected $dates=['dateBulanAvg'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['idAvg'];
	protected $primaryKey = 'idAvg';
}
