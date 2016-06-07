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

	function ajaxAdd($jsonStr)
	{
		$added = 0;
		$response["status"] = "ERROR";
		$jsonArr = json_decode($jsonStr, true);
		$totalItem = count($jsonArr["info"]);
		$childs = Childs::find($jsonArr["childs_id"]);
		if(is_null($childs))
		{
			$response["message"] = "Không tồn tại childs với id = ".$jsonArr["childs_id"];
		}
		else
		{
			foreach ($childs->images as $image) {
				$image->delete();
				$image->save();
			}
			$notfoundimage = false;
			foreach($jsonArr["info"] as $data)
			{
				$image = Images::find($data["images_id"]);
				if(is_null($image))
				{
					$response["message"] = "Không tồn tại images với id = ".$data["images_id"];
					$notfoundimage = true;
					break;
				}
			}
			if(!$notfoundimage)
			{
				foreach($jsonArr["info"] as $data)
				{
					$image = Images::find($data["images_id"]);
					if(!is_null($image))
					{
						$record = new Results();
						$record->childs_id = $jsonArr["childs_id"];
						$record->images_id = $data["images_id"];
						$record->word = $data["word"];
						$record->correct = $data["correct"];
						$record->incorrect = $data["incorrect"];
						$record->save();
						$added++;
					}
				}
				if($added == $totalItem)
				{
					$response = ["status" => "SUCCESS", "message" => "Added $added item!"];
				}
			}
		}
		return json_encode($response);
	}

}
