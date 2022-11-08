<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KasbonModel extends Model
{
    protected $table = 'costcenter_kasbon';
    protected $fillable = [];
    protected $guarded = ['idKasbon'];
	protected $primaryKey = 'idKasbon';
}
