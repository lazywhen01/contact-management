<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContactRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
	 */
	public function rules(): array
	{
		return [
			'first_name' 	=> [
				'required',
				'string',
			],
			'last_name' 	=> [
				'required',
				'string',
			],
			'sex'					=> [
				'required',
				'in:Male,Female',
			],
			'age'					=> [
				'required',
				'integer',
			],
			'email'				=> [
				'required',
				Rule::unique('contacts', 'email')
			],
		];
	}
}
