<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KcsToptenIssuedModel extends Model
{
    protected $table = 'kcs_toptenissued';
    protected $fillable = [];
    protected $guarded = ['idkcstoptenissued'];
	protected $primaryKey = 'idkcstoptenissued';
}
