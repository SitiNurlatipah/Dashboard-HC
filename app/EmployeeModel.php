<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    protected $table = 'employee';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'intJumlahEmployee', 'intKaryawan','intContract', 'intOutsource', 'dateStartDate','dateEndDate',
	];
}
