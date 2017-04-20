<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromocodesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('promocodes', function (Blueprint $table) {
			$table->increments('id');

			$table->string('code', 32)->unique();
			$table->double('reward', 10, 2)->nullable();
			$table->integer('quantity')->default(-1);
			$table->dateTime('expiry_date')->nullable();
			// $table->dateTime('is_used')->nullable();
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
		Schema::drop('promocodes');
	}
}
