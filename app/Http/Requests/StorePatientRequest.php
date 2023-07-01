<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Patient;
class StorePatientRequest extends FormRequest
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
        // dd(Patient::validation());
        $rules=[
            'phone'=>'required|regex:/^01[0125][0-9]{8}$/|unique:patients,phone,'. $this->id,
            'password' => 'required|min:8|confirmed',  
        ];
        $rules=array_merge($rules,Patient::validation());
        return  $rules;
    }
}
