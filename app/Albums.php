<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model {

	protected $table = 'albums';
	protected $fillable = ['album_id','name','description', 'parent_id', 'cate_id'];
	public function images()
	{
		return $this -> hasmany("App\Images") ;
	}
	public function categori()
	{
		return $this->belongTo("App\Categories");
	}
	public function parent()
	{
		return $this->belongTo("App\Parents");
	}

}
?>