<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GetoModel extends Model
{
    protected $table = 'getos';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];
	protected $dates=['dateTglInput'];
	protected $fillable = [
		'intTotal', 'intGetoKaryawan','intGetoKontark', 
        'intGetoOutsource', 'dateTglInput', 
	];
}