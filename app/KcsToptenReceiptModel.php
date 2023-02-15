<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KcsToptenReceiptModel extends Model
{
    protected $table = 'kcs_toptenreceipt';
    protected $fillable = [];
    protected $guarded = ['idkcstoptenreceipt'];
	protected $primaryKey = 'idkcstoptenreceipt';
}
