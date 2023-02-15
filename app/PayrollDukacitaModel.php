<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayrollDukacitaModel extends Model
{
    protected $table = 'payroll_dukacita';
    protected $fillable = [];
    protected $guarded = ['id_dukacita'];
	protected $primaryKey = 'id_dukacita';
}
