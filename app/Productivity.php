<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Productivity extends Model
{
    protected $table = 'productivity_manpowers';
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
	public function humancost()
	{
		// return $this->hasOne('App\HumanCost');
		// return $this->belongsTo(HumanCost::class);
	}
}
