<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayrollTerlambatModel extends Model
{
    protected $table = 'payroll_terlambat';
    protected $fillable = [];
    protected $guarded = ['id_terlambat'];
	protected $primaryKey = 'id_terlambat';
}
