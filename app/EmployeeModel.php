<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    protected $table = 'employees';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];
	protected $fillable = [
		'intJumlahEmployee', 'intKaryawan','intContract', 'intOutsource', 'dateTglInput','txtBulanInput',
	];
}
