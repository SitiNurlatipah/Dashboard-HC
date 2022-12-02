<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GetoModel extends Model
{
    protected $table = 'geto_employees';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['idGeto'];
	protected $primaryKey = 'idGeto';

	// protected $dates=['dateTglInput'];
	protected $fillable = [
		
	];
}
