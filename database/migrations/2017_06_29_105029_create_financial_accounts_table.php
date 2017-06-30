<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancialAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_accounts', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name', 50)->unique();
			$table->integer('type_id')->unsigned();
			$table->foreign('type_id')
				->references('id')->on('basic_account_types')
				->onDelete('cascade');
			$table->string('bank_name', 50)->nullable();
			$table->string('account_number', 30)->nullable();
			$table->string('currency_code',10);
			$table->foreign('currency_code')
				->references('code')->on('currencies')
				->onDelete('cascade');
			$table->string('description',500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financial_accounts');
    }
}
