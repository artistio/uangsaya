<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreFinancialAccount;
use App\BasicAccountType;
use App\FinancialAccount;

class FinancialAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$AccountLists = FinancialAccount::all();
		return view('account.listaccount')
			->with('accountList', $AccountLists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$BasicAccountType = BasicAccountType::all();
		return view('account.createaccount')
		  ->with('basicAccountType', $BasicAccountType)
		  ->with('currencyList', currency()->getCurrencies());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFinancialAccount $request)
    {
        //
		$newAccount = new FinancialAccount;
		$newAccount->name = $request->name;
		$newAccount->type_id = $request->type_id;
		$newAccount->bank_name = $request->bank_name;
		$newAccount->account_number = $request->account_number;
		$newAccount->currency_code = $request->currency;
		$newAccount->description = $request->description;
		$newAccount->save();
		return view("account.createaccountresult");
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
