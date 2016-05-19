<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model {

	protected $table = 'images';
	protected $fillable = ['image_id','url','word', 'album_id'];
	public function album()
	{
		return $this->belongTo("App\Albums");
	}

}
