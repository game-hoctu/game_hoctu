<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model {

	protected $table = 'images';
	protected $fillable = ['id','url','word', 'albums_id','created_at', 'updated_at'];
	public function albums()
	{
		return $this->belongsTo("App\Albums");
	}
	public function childs()
	{
		return $this->belongsToMany('App\Childs', 'results', 'childs_id', 'images_id');
	}
}
