<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FinancialAccount;

class TransactionController extends Controller
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
		switch (true) {
			case (preg_match("/income/", url()->current())?true:false):
				$transactionType='income';
				$sourceAccount=FinancialAccount::where('type_id', 3)->get();
				$destinationAccount=FinancialAccount::where('type_id', 1)->get();
				break;
			case (preg_match("/expense/", url()->current())?true:false):
				$transactionType='expense';
				$sourceAccount=FinancialAccount::where('type_id', 1)->get();
				$destinationAccount=FinancialAccount::where('type_id', 4)->get();
				break;
			case (preg_match("/transfer/", url()->current())?true:false):
				$sourceAccount=FinancialAccount::all();
				$destinationAccount=FinancialAccount::all();
				$transactionType='transfer';
				break;
		}
		
		return view('transaction.newtransaction')
			->with('transaction_type', $transactionType)
			->with('source_account', $sourceAccount)
			->with('destination_account', $destinationAccount);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
