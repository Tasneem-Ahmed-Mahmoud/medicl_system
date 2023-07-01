<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExaminationRequest extends FormRequest
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
        return [
            //
            'patient_id'=>'required',
            'doctor_id'=>'required',
            'file'=>'required|mimes:jpeg,png,jpg,pdf',
            'description' =>'required|max:300',
            'title'=>'required|max:40',
            // 'status'=>'required',
            'price'=>'required',
            'offer'=>'required',
            'date'=>'date|required'
        ];
    }
}
