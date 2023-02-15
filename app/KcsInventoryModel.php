<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KcsInventoryModel extends Model
{
    protected $table = 'inventory_kcs';
    protected $fillable = [];
    protected $guarded = ['idinventory'];
	protected $primaryKey = 'idinventory';
}
