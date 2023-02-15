<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayrollKelahiranModel extends Model
{
    protected $table = 'payroll_kelahiran';
    protected $fillable = [];
    protected $guarded = ['id_kelahiran'];
	protected $primaryKey = 'id_kelahiran';
}
