<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KcsJmlCodeModel extends Model
{
    protected $table = 'kcs_jmlcode';
    protected $fillable = [];
    protected $guarded = ['idJmlCode'];
	protected $primaryKey = 'idJmlCode';
}
