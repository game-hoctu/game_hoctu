<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Childs extends Model {

	protected $table = 'childs';
	protected $fillable = ['id','name','users_id','created_at', 'updated_at','image','sex'];

	public function user()
	{
		return $this->belongsTo("App\User");
	}

	public function images()
	{
		return $this->belongsToMany('App\Images', 'results', 'childs_id', 'images_id');
	}
}
