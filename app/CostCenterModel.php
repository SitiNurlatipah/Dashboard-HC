<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CostCenterModel extends Model
{
    protected $table = 'cost_centers';
    protected $fillable = [];
    protected $guarded = ['id'];
	protected $primaryKey = 'id';
}
