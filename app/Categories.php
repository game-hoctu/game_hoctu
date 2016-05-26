<?php namespace App;
use App\Albums;
use Illuminate\Database\Eloquent\Model;
//use App\Albums;
class Categories extends Model {
	protected $table = 'categories';
	protected $fillable = ['id','name'];
	public function albums()
	{
		return $this->hasMany("App\Albums") ;
	}
	
}
