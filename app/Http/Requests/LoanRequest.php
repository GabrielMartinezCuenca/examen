<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
{
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
            'client_id'=>'numeric|required',
            'book_id'=>'numeric|required',
            'desired'=>'boolean|required',
            'start_date'=>'date|required',
            'end_date'=>'date|required',
            'return_date'=>'nullable|date',
        ];
    }
}
