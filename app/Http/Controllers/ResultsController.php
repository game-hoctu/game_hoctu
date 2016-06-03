<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Results;
use App\Childs;
use App\Images;
class ResultsController extends Controller {

	//

	function ajaxAddResult()
	{
		// $data['status'] = "ERROR";
		// $result = Results::where('childs_id', $childs_id)->where('images_id', $images_id)->first();
		// if(!is_null($result))
		// {
		// 	// $result = new Results();
		// 	// $result = $result->find(['childs_id' => $childs_id, 'images_id' => $images_id]);
		// 	// $result->word = $word;
		// 	// $result->correct = $correct;
		// 	// $result->incorrect = $incorrect;
		// 	// $result->save();
		// 	// $data['status'] = "SUCCESS";
		// }
		// else
		// {
		// 	$result = new Results();
		// 	$result["childs_id"] = $childs_id;
		// 	$result->images_id = $images_id;
		// 	$result->word = $word;
		// 	$result->correct = $correct;
		// 	$result->incorrect = $incorrect;
		// 	$result->save();
		// 	$data['status'] = "SUCCESS";
		// }
		// return $data;
		$result = new Results();
		$child = Childs::find(1);
		$image = Images::find(2);
		$checkResult = $result->where('childs_id', 1)->where('images_id', 2)->first();
		echo $checkResult;
		echo $image;
		echo $child;
	}

	function ajaxAdd($result)
	{
		//echo $result;
		$json = json_decode($result, true);
		foreach($json["info"] as $data)
		{
			$result = new Results();
			$child = Childs::find($data["childs_id"])->toArray();
			$image = Images::find($data["images_id"])->toArray();
			$checkResult = Results::where('childs_id', $data["childs_id"])->where('images_id', $data["images_id"])->get()->toArray();
			if(count($child) != 0 && count($image) != 0)
			{
				if(count($checkResult) == 0)
				{
					$result->childs_id = $data["childs_id"];
					$result->images_id = $data["images_id"];
					$result->word = $data["word"];
					$result->correct = $data["correct"];
					$result->incorrect = $data["incorrect"];
					$result->save();
				}
				else
				{

				}
			}
		}
		return "OK";
	}

}
