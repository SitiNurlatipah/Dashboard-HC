<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingTotalPerMonth extends Model
{
    protected $table = 'training_total_per_month';
	public $timestamps = true;
	protected $dates=['dateBulan'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['idTrainingTotalPerMonth'];
	protected $primaryKey = 'idTrainingTotalPerMonth';
}
