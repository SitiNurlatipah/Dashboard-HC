<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'users';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];
	protected $fillable = [
	];
	public function dos()
	{
		// return $this->hasMany(RecruitmentModel::class,'user_id');
		return $this->hasMany('App\RecruitmentModel','id');
	}
}
