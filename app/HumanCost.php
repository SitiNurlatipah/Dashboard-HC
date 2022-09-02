<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class HumanCost extends Model
{
    protected $table = 'productivity_humancosts';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];
	protected $dates=['dateBulan'];
	// protected $fillable = [
	// 'dateBulan','intCostPlan','intCost'
	// ];
	// public function productivity()
	// {
	// 	return $this->belongsTo('App\Productivity');
	// 	// return $this->belongsTo(Productivity::class,'dateBulan');
	// }
}
