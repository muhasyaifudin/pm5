<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SampleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'age' => 'required|integer|min:18',
            'gender' => 'required|in:male,female,other',
            'address' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'date_of_birth' => 'required|date',
            'time_of_birth' => 'required|date_format:H:i',
            'website' => 'required|url',
            'credit_card' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:16',
            'interests' => 'required|array',
            'interests.*' => 'in:reading,traveling,gaming,other',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'resume' => 'required|mimes:pdf,doc,docx|max:10000',
        ];
    }
}
