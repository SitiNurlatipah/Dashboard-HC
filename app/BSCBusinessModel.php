<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BSCBusinessModel extends Model
{
    //idbussiness
    protected $table = 'bcc_internalbusiness';
	public $timestamps = true;
	protected $guarded = ['idbussiness'];
	protected $primaryKey = 'idbussiness';
}
