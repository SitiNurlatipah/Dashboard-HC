<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'users';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];
	protected $fillable = [
		'id','txtNik', 'txtUsername','txtPassword', 'txtEmployeeName','txtJobTitle', 'txtDepartment', 'txtEmail','txtStatus', 'txtType','dtmStartDate','dtmEndDate','txtGender',
	];
}
