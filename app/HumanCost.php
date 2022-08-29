<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Productivity;

class HumanCost extends Model
{
    protected $table = 'productivity_humancost';
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
	// public function productiv()
	// {
	// 	return $this->hasOne(Productivity::class,'dateBulan');
	// 	// return $this->belongsTo(Productivity::class,'dateBulan');
	// }
}
