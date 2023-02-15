<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KchToptenIssuedModel extends Model
{
    protected $table = 'kch_toptenissued';
    protected $fillable = [];
    protected $guarded = ['idkchtoptenissued'];
	protected $primaryKey = 'idkchtoptenissued';
}
