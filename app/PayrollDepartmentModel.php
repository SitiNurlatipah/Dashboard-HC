<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayrollDepartmentModel extends Model
{
    protected $table = 'department';
    protected $fillable = [];
    protected $guarded = ['iddepartment'];
	protected $primaryKey = 'iddepartment';
}
