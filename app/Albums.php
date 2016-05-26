<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model {

	protected $table = 'albums';
	protected $fillable = ['id','name','description','categories_id'];
	protected $hidden = ['users_id'];
	public function images()
	{
		return $this -> hasMany("App\Images", 'foreign_key') ;
	}
	public function categories()
	{
		return $this->belongsTo("App\Categories");
	}
	public function users()
	{
		return $this->belongsTo("App\Users");
	}

}
?>