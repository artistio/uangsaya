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
			$table->string('name', 50);
			$table->integer('type_id')->unsigned();
			$table->foreign('type_id')
				->references('id')->on('basic_account_types')
				->onDelete('cascade');
			$table->integer('account_number')->unsigned();
			$table->string('currency_code',10);
			$table->foreign('currency_code')
				->references('code')->on('currencies')
				->onDelete('cascade');
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
