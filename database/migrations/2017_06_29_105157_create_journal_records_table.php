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
			$table->tinyInteger('transactionType')->unsigned();
			$table->double('amount');
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
