<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToModel extends Model
{
    protected $table = 'to_employees';
	public $timestamps = true;
	protected $guarded = ['idTo'];
	protected $primaryKey = 'idTo';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	// protected $dates=['dateTglInput'];
	protected $fillable = [
	];
}
