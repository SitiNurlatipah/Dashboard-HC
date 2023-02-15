<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KchInventoryModel extends Model
{
    protected $table = 'kch_inventory';
    protected $fillable = [];
    protected $guarded = ['idkchinventory'];
	protected $primaryKey = 'idkchinventory';
}
