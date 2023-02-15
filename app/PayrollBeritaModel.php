<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayrollBeritaModel extends Model
{
    protected $table = 'payroll_berita';
    protected $fillable = [];
    protected $guarded = ['idberita'];
	protected $primaryKey = 'idberita';
}
