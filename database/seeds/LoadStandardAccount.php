<?php

use Illuminate\Database\Seeder;

class LoadStandardAccount extends Seeder
{
    /**
     * Loading the Financial Account Table with standard chart of account
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('financial_accounts')->truncate();
		
		DB::table('financial_accounts')->insert([
			['name' => 'Cash in Hand', 'type_id' => 1, 'account_code' => '1000', 'currency_code' => 'IDR', 'description' => 'Uang tunai' ],
			['name' => 'Pemasukan Lain-lain', 'type_id' => 3, 'account_code' => '3ZZZ', 'currency_code' => 'IDR', 'description' => 'Pemasukan yang belum memiliki kategory' ],
			['name' => 'Pengeluaran Lain-lain', 'type_id' => 4, 'account_code' => '4ZZZ', 'currency_code' => 'IDR', 'description' => 'Pengeluaran yang belum memiliki kategory' ],
			['name' => 'Saldo Awal', 'type_id' => 5, 'account_code' => '5000', 'currency_code' => 'IDR', 'description' => 'Saldo Awal Rekening' ]
		]);
    }
}
