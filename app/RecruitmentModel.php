<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecruitmentModel extends Model
{
    protected $table = 'recruitment_progress';
    protected $fillable = [];
    protected $guarded = ['idRecruitment'];
	protected $primaryKey = 'idRecruitment';
    // public function user()
	// {
	// 	// return $this->belongsTo(UserModel::class,'txtNik');
    //     return $this->belongsTo('App\UserModel', 'txtNik');
        
    // }
}
    
