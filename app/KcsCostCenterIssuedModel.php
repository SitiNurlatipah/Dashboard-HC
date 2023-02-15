<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KcsCostCenterIssuedModel extends Model
{
    protected $table = 'kcs_costcenter';
    protected $fillable = [];
    protected $guarded = ['idkcscostcenter'];
	protected $primaryKey = 'idkcscostcenter';
}
