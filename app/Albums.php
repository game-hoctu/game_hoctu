<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model {

	protected $table = 'albums';
	protected $fillable = ['id','name','description','categories_id','users_id', 'created_at', 'updated_at','downloads'];
	public function images()
	{
		return $this -> hasMany("App\Images", "albums_id") ;
	}
	public function categories()
	{
		return $this->belongsTo("App\Categories");
	}
	public function user()
	{
		return $this->belongsTo("App\User");
	}

}
?>