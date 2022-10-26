<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HrgaModel extends Model
{
    protected $table = 'hrga_issues';
	public $timestamps = true;
    protected $guarded = ['id'];
	protected $primaryKey = 'id';
    protected $fillable=['namaKegiatan','tempat','tanggal'];
}
