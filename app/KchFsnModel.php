<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KchFsnModel extends Model
{
    protected $table = 'kch_fsn';
    protected $fillable = [];
    protected $guarded = ['idkchfsn'];
	protected $primaryKey = 'idkchfsn';
}
