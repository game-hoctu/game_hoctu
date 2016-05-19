<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model {

	//
	protected $table = 'parents';
	protected $primaryKey = 'parent_id';
	protected $fillable = ['parent_id','email','fullname'];
	protected $hidden = ['password'];
	public function album()
	{
		return $this->hasmany('App\Albums');
	}
}
