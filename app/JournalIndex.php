<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JournalIndex extends Model
{
    // Accessing Journal Records
	public function records()
    {
        return $this->hasMany('App\JournalRecord');
    }
}
