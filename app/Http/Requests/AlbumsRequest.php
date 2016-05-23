<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AlbumsRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name'=> 'required|unique:albums,name',
			'description' => 'required',
		];
	}
	public function messages()
	{
		return [
			'name.required' => 'Tên album không được bỏ trống',
			'description.required' => 'Mô tả không được để trống'
		];
	}

}
