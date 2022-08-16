<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
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
	protected $dates=['dateTglInput'];
	protected $fillable = [
		'intJumlahEmployee', 'intKaryawan','intContract', 'intOutsource', 'dateTglInput',
	];
	
}
