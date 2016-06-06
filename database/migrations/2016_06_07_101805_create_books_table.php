<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBooksTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('books', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->integer('category_id')->unsigned();
			$table->text('description');
			$table->softDeletes();
			$table->timestamps();

			$table->foreign('category_id')->references('id')->on('categories')
				->onDelete('cascade')
				->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('books');
	}
}
