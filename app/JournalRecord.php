<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class JournalRecord extends Model
{
	protected $dates = [
        'created_at',
        'updated_at',
        'transaction_date'
    ];

	// Defining Constant for column transactionType
//	const TRANSACTION_TYPE_DEBIT = 1;
//	const TRANSACTION_TYPE_CREDIT = 2;

	// Mutator to save date from input d/m/Y (i.e. 20/07/2017)
	public function setTransactionDateAttribute($value) {
		$this->attributes['transaction_date'] = Carbon::createFromFormat('d/m/Y', $value);
	}


    // Method to access the index
	public function index()
    {
        return $this->belongsTo('App\JournalIndex');
    }
	
	// Method to access account namespace
	public function financialAccount() {
		return $this->belongsTo('App\FinancialAccount', 'account_code', 'account_code');
	}
}
