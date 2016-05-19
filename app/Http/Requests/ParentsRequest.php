<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ParentsRequest extends Request {

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
			'txtusername' => 'required|unique:parents,email',
			'txtpassword' => 'required|min:6',
			'txtfullname' => 'required'
		];
	}
	public function messages()
	{
		return [
			'txtusername.required' => 'Username không được bỏ trống',
			'txtpassword.required' => 'Password không được để trống',
			'txtfullname.required' => 'Fullname không được để trống',
			'txtusername.unique' => 'Tên này đã tồn tại vùi lòng nhập lại',
			'txtpassword.min' => 'Mật khẩu phải lớn hơn 6 ký tự'
		];
	}

}
