<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KcsDepartmentModel extends Model
{
    protected $table = 'kcs_department';
    protected $fillable = [];
    protected $guarded = ['idkcsdepartment'];
	protected $primaryKey = 'idkcsdepartment';
}
