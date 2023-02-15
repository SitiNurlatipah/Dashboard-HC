<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KcsToptenModel extends Model
{
    protected $table = 'kcs_topten';
    protected $fillable = [];
    protected $guarded = ['idtopten'];
	protected $primaryKey = 'idtopten';
}
