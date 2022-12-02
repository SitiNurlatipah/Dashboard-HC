<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IkatanDinasModel extends Model
{
    protected $table = 'ikatan_dinas';
    protected $fillable = [];
    protected $guarded = ['idIkatanDinas'];
	protected $primaryKey = 'idIkatanDinas';
}
