<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BalanceScorecardModel extends Model
{
    protected $table = 'balance_scorecards';
	public $timestamps = true;
	protected $guarded = ['idfinancial'];
	protected $primaryKey = 'idfinancial';
}
