<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class JournalIndex extends Model
{
	protected $dates = [
        'created_at',
        'updated_at',
        'transaction_date'
    ];
	
	// Mutator to save date from input d/m/Y (i.e. 20/07/2017)
	public function setTransactionDateAttribute($value) {
		$this->attributes['transaction_date'] = Carbon::createFromFormat('d/m/Y', $value);
	}
	
    // Accessing Journal Records
	public function records()
    {
        return $this->hasMany('App\JournalRecord');
    }
}
