<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KcsFsnModel extends Model
{
    protected $table = 'kcs_fsn';
    protected $fillable = [];
    protected $guarded = ['idkcsfsn'];
	protected $primaryKey = 'idkcsfsn';
}
