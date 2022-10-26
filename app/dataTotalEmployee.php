<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataTotalEmployee extends Model
{
    protected $table = 'data_total_employee';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];
	// protected $dates=['dateBulan'];
	protected $fillable = [
	
	];
}
