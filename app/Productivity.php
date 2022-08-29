<?php

namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\HumanCost;

class Productivity extends Model
{
    protected $table = 'productivity_manpower';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];
	public $dates=['dateBulan'];
	protected $fillable = [
	
	];
	// public function humancost()
	// {
	// 	// return $this->hasOne(HumanCost::class,'dateBulan');
	// 	return $this->belongsTo(HumanCost::class,'dateBulan','intOutputPlan','intOutputActual');
	// }
}
