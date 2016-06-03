<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Results extends Model {

	//
	protected $table = 'results';
	protected $fillable = ['childs_id','images_id','word', 'correct', 'incorrect'];
	
	public function childs()
	{
		return $this->belongsTo("App\Childs");
	}

	public function images()
	{
		return $this->belongsTo("App\Images");
	}
}
