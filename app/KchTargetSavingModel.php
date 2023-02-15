<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KchTargetSavingModel extends Model
{
    protected $table = 'kch_target_saving';
    protected $fillable = [];
    protected $guarded = ['idkchtargetsaving'];
	protected $primaryKey = 'idkchtargetsaving';
}
