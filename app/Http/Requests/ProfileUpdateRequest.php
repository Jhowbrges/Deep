<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileUpdateRequest extends FormRequest
{
	public function authorize(): bool
	{
		return true;
	}

	public function rules(): array
	{
		return [
			'name' => ['required', 'string', 'max:255'],

			'email' => [
				'required',
				'string',
				'email',
				'max:255',
				Rule::unique('users', 'email')->ignore($this->user()->id),
			],

			'password' => [
				'nullable',
				'confirmed',
				Password::min(8)
					->mixedCase()
					->numbers(),
			],
			// Foto opcional (jpg/jpeg/png até 2MB)
			'profile_photo' => [
				'nullable',
				'image',
				'mimes:jpg,jpeg,png',
				'max:2048',
			],
		];
	}
}

