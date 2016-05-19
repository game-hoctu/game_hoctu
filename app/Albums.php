<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model {

	//
	protected $table = 'albums';
	protected $fillable = ['album_id','name','description', 'parent_id', 'cate_id'];
	//protected $hidden = ['password'];
}
