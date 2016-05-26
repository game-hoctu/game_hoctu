<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model {

	protected $table = 'images';
	protected $fillable = ['id','url','word', 'albums_id'];
	public function albums()
	{
		return $this->belongsTo("App\Albums");
	}

}
