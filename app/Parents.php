<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model {

	//
	protected $table = 'parents';
	protected $fillable = ['parent_id','email','fullname'];
	protected $hidden = ['password'];
}
