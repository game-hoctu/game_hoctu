<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddCategoriesRequests extends Request {

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
			'name' => 'required|unique:categories,name'
		];
	}
	public function messages()
	{
		return [
			'name.required' => 'Vui lòng nhập vào tên thể loại',
			'name.unique' => 'Tên thể loại này đã tồn tại vui lòng nhập vào tên khác'
		];
	}

}
