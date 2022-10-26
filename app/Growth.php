<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Growth extends Model
{
    protected $table = 'productivity_growths';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['idGrowth'];
	protected $primaryKey = 'idGrowth';
	// protected $dates=['dateBulanGrowth'];
	// protected $fillable = [
	// 'dateBulan','intCostPlan','intCost'
	// ];
	public function productiv()
	{
		return $this->belongsTo('App\Productivity');
		// return $this->belongsTo(Productivity::class,'dateBulan');
	}
	public function cost()
	{
		return $this->belongsTo('App\HumanCost');
		// return $this->belongsTo(Productivity::class,'dateBulan');
	}
}
