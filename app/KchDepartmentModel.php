<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KchDepartmentModel extends Model
{
    protected $table = 'kch_department';
    protected $fillable = [];
    protected $guarded = ['idkchdepartment'];
	protected $primaryKey = 'idkchdepartment';
}
