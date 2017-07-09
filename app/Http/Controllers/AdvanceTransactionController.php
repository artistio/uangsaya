<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\FinancialAccount;
use App\Contact;
use App\JournalIndex;
use App\JournalRecord;
use App\Http\Requests\ValidateTransactionAdvance;

class AdvanceTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view('transaction.newtransactionadvance')
			->with('accounts', FinancialAccount::all())
			->with('contacts', Contact::orderBy('name')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateTransactionAdvance $request)
    {
        // First need to validate the transaction:
		// 1. Total Debit = Total Credit
		
		// Start Database Transaction
		DB::beginTransaction();
		
		// If request is valid, first create new Journal Index
		$newJournalIndex = new JournalIndex;
		$newJournalIndex->name = "Journal_Index_".time();
		$newJournalIndex->transaction_date = $request->transaction_date;
		$newJournalIndex->save();
		
		// Now process the Debit Transaction
		$index = 0;
		foreach ($request['debit_account'] as $account) {
			if ($account != '') {
				$newJournalEntry = new JournalRecord;
				$newJournalEntry->journal_id = $newJournalIndex->id;
				$newJournalEntry->transaction_date = $request->transaction_date;
				$newJournalEntry->account_code = $account;
				$newJournalEntry->debit_amount = $request['debit_amount'][$index];
				$newJournalEntry->credit_amount = 0;
				$newJournalEntry->contact_id = $request['debit_contact'][$index];
				$newJournalEntry->description = $request['description'];
				$newJournalEntry->save();
			}
			$index++;			
		}

		// Now process the Credit Transaction
		$index = 0;
		foreach ($request['credit_account'] as $account) {
			if ($account != '') {
				$newJournalEntry = new JournalRecord;
				$newJournalEntry->journal_id = $newJournalIndex->id;
				$newJournalEntry->transaction_date = $request->transaction_date;
				$newJournalEntry->account_code = $account;
				$newJournalEntry->debit_amount = 0;
				$newJournalEntry->credit_amount = $request['credit_amount'][$index];
				$newJournalEntry->contact_id = $request['credit_contact'][$index];
				$newJournalEntry->description = $request['description'];
				$newJournalEntry->save();
			}
			$index++;			
		}
		
		// In case of no error, commit the change in Database
		DB::commit();
		return view('transaction.transactionresult')
			->with('journalId', $newJournalIndex->id)
			->with('journalEntries', JournalRecord::where('journal_id', $newJournalIndex->id)->get())
			->with('accounts', FinancialAccount::all());		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
