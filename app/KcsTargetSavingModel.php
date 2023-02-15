<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KcsTargetSavingModel extends Model
{
    protected $table = 'target_saving_kcs';
    protected $fillable = [];
    protected $guarded = ['idtargetsaving'];
	protected $primaryKey = 'idtargetsaving';
}
