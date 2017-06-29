<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JournalRecord extends Model
{
	// Defining Constant for column transactionType
	const TRANSACTION_TYPE_DEBIT = 1;
	const TRANSACTION_TYPE_CREDIT = 2;

    // Method to access the index
	public function index()
    {
        return $this->belongsTo('App\JournalIndex');
    }
}
