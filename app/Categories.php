<?php namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Albums;
class Categories extends Model {
	protected $table = 'categories';
	protected $fillable = ['cate_id','name'];
	public function albums()
	{
		return $this -> hasmany("App\Albums") ;
	}
	
}
