<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MppModel extends Model
{
    protected $table = 'mpp_employee';
    protected $fillable = [];
    protected $guarded = ['idmpp'];
	protected $primaryKey = 'idmpp';
}
