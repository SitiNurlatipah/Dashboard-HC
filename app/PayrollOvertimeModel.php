<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayrollOvertimeModel extends Model
{
    protected $table = 'topten_overtime';
    protected $fillable = [];
    protected $guarded = ['idtop_ot'];
	protected $primaryKey = 'idtop_ot';
}
