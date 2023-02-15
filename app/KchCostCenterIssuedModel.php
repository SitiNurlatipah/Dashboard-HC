<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KchCostCenterIssuedModel extends Model
{
    protected $table = 'kch_costcenter';
    protected $fillable = [];
    protected $guarded = ['idkchcostcenter'];
	protected $primaryKey = 'idkchcostcenter';
}
