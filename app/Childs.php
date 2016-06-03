<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Childs extends Model {

	protected $table = 'childs';
	protected $fillable = ['id','name','users_id'];

	public function user()
	{
		return $this->belongsTo("App\User");
	}

	public function images()
	{
		return $this->belongsToMany('App\Images');
	}
}
