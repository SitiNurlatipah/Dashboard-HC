<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LearningHoursTrainingModel extends Model
{
    protected $table = 'training_learninghours';
    protected $fillable = [];
    protected $guarded = ['id_learninghours'];
	protected $primaryKey = 'id_learninghours';
}
