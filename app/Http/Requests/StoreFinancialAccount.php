<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFinancialAccount extends FormRequest
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
            //
			'name' => 'required|max:50',
			'type_id' => 'required',
			'bank_name' => 'max:50',
			'account_number' => 'digits_between:0,30',
			'currency' => 'required|max:3',
			'description' => 'max:500',
        ];
    }
}
