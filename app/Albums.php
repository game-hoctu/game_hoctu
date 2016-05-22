<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model {

	protected $table = 'albums';
	protected $fillable = ['id','name','description', 'users_id', 'categories_id'];
	public function images()
	{
		return $this -> hasmany("App\Images") ;
	}
	public function categories()
	{
		return $this->belongTo("App\Categories");
	}
	public function users()
	{
		return $this->belongTo("App\Users");
	}

}
?>