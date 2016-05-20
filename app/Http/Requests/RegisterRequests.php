<?php namespace App\Http\Requests;
use App\Http\Requests\Request;

class RegisterRequests extends Request {

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
			'email' => 'required|unique:parents,email',
			'password' => 'required|min:6|max:30',
			'name' => 'required|'
		];
	}
	public function messages()
	{
		return [
			'email.required'=>'Vui lòng nhập vào email',
			'password.required'=>'Vui lòng nhập mật khẩu',
			'name.required' => 'Vui lòng nhập vào tên đầy đủ',
			'email.required'=>'Email này đã tồn tại',
			'password.min'=>'Mật khẩu phải lớn hơn 6 ký tự',
			'password.max'=> 'Mật khẩu không quá 30 ký tư',
			//'email.email'=>'Đây không phải là một email'
		];
	}

}
