<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialAccount extends Model
{
    //
	
	public function journalRecords () {
		return $this->hasMany('App\JournalRecord', 'account_code', 'account_code');
	}
}
