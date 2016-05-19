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
			'txttenalbum'=> 'required|unique:albums,name',
			'txtmota' => 'required',
			'txthoten' => 'required',
		];
	}
	public function messages()
	{
		return [
			'txttenalbum.required' => 'Tên album không được bỏ trống',
			'txtmota.required' => 'Mô tả không được để trống',
			'txthoten.required' => 'Tên không được để trống',
			'txttenalbum.unique' => 'Tên Albums không được trùng'
		];
	}

}
