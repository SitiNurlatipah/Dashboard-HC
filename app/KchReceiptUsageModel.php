<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KchReceiptUsageModel extends Model
{
    protected $table = 'kch_receiptandissue';
    protected $fillable = [];
    protected $guarded = ['idkchreceiptissue'];
	protected $primaryKey = 'idkchreceiptissue';
}
