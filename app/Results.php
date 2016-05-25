<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Results extends Model {

	//
	protected $table = 'results';
	protected $fillable = ['childs_id','images_id','word', 'correct', 'incorrect'];
	protected $primaryKey = ['childs_id','images_id'];
	public function childs()
	{
		return $this->belongTo("App\Childs");
	}
	public function images()
	{
		return $this->belongTo("App\Images");
	}
}
