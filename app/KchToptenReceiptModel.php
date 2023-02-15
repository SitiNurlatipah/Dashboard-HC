<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KchToptenReceiptModel extends Model
{
    protected $table = 'kch_toptenreceipt';
    protected $fillable = [];
    protected $guarded = ['idkchtoptenreceipt'];
	protected $primaryKey = 'idkchtoptenreceipt';
}
