<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_records', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('journal_id')->unsigned();
			$table->foreign('journal_id')
				->references('id')->on('journal_indices')
				->onDelete('cascade');
			$table->date('transaction_date');
			$table->string('account_code', 10);
			$table->foreign('account_code')
				->references('account_code')->on('financial_accounts')
				->onDelete('cascade');
			$table->double('debit_amount')->default(0);
			$table->double('credit_amount')->default(0);
			$table->string('description', 100)->nullable();
			$table->integer('contact_id')->unsigned()->nullable();
			$table->foreign('contact_id')
				->references('id')->on('contacts')
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
        Schema::dropIfExists('journal_records');
    }
}
