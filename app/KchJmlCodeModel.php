<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KchJmlCodeModel extends Model
{
    protected $table = 'kch_jmlcode';
    protected $fillable = [];
    protected $guarded = ['idkchjmlcode'];
	protected $primaryKey = 'idkchjmlcode';
}
