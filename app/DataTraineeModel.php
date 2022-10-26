<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataTraineeModel extends Model
{
    protected $table = 'data_trainees';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['idTrainee'];
	protected $primaryKey = 'idTrainee';

	// public function training()
	// {
	// 	return $this->belongsTo(TrainingRealization::class,'id');
	// }
}
