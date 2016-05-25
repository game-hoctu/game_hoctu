<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Results;

class ResultsController extends Controller {

	//

	function ajaxAddResult($childs_id, $images_id, $word, $correct, $incorrect)
	{
		$data['status'] = "ERROR";
		$result = Results::where('childs_id', $childs_id)->where('images_id', $images_id)->first();
		if(!is_null($result))
		{
			// $result = new Results();
			// $result = $result->find(['childs_id' => $childs_id, 'images_id' => $images_id]);
			// $result->word = $word;
			// $result->correct = $correct;
			// $result->incorrect = $incorrect;
			// $result->save();
			// $data['status'] = "SUCCESS";
		}
		else
		{
			$result = new Results();
			$result->childs_id = $childs_id;
			$result->images_id = $images_id;
			$result->word = $word;
			$result->correct = $correct;
			$result->incorrect = $incorrect;
			$result->save();
			$data['status'] = "SUCCESS";
		}
		return $data;
	}

}
