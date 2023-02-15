<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KcsReceiptUsageModel extends Model
{
    protected $table = 'kcs_receiptandissue';
    protected $fillable = [];
    protected $guarded = ['idreceiptissue'];
	protected $primaryKey = 'idreceiptissue';
}
