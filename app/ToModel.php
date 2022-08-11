<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToModel extends Model
{
    protected $table = 'tos';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];
	protected $fillable = [
		'intTotal', 'intToKaryawan','intToKontrak', 
        'intToOutsource','txtBulanInput', 'dateTglInput', 
	];
}
