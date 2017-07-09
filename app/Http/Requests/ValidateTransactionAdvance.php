<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateTransactionAdvance extends FormRequest
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
			'debit_account.*' => 'alpha_num|nullable',
			'credit_account.*' => 'alpha_num|nullable', 
			'debit_amount.*' => 'numeric|nullable',
			'credit_amount.*' => 'numeric|nullable',
			'debit_contact.*' => 'numeric|nullable',
			'credit_contact.*' => 'numeric|nullable'
        ];
    }
}
