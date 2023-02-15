<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BSCCustomerModel extends Model
{
    protected $table = 'bsc_customer';
	public $timestamps = true;
	protected $guarded = ['idcustomer'];
	protected $primaryKey = 'idcustomer';
}
