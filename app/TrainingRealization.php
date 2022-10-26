<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingRealization extends Model
{
    protected $table = 'training_realizations';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];

	// public function pesertas()
	// {
	// 	return $this->hasMany(DataTraineeModel::class,'training_id');
	// }
}
