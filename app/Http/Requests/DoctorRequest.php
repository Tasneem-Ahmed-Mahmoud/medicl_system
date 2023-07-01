<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // dd($this->user_id);
        return [
            'name'=>'required|min:3|max:20',
            'password' => 'required|min:8|confirmed',
            'email'=>'required|email|unique:users,email,'.$this->doctor->user_id,
            'phone'=>'required|regex:/^01[0125][0-9]{8}$/|unique:users,phone,'.$this->doctor->user_id,
            'image'=>'nullable|mimes:jpeg,png,jpg',
            'description'=>'required|min:3|max:100',
            'specialty_id'=>'required',
        ];
    }
}
