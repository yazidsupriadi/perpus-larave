<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('name');
            $table->string('picture');
            $table->integer('publication_year');
            $table->string('pages');
            $table->longText('description');
            $table->integer('qty');
            $table->unsignedInteger('author_id')->nullable();
            $table->foreign('author_id')
                ->on('authors')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedInteger('publisher_id')->nullable();
            $table->foreign('publisher_id')
                ->on('publishers')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')
                ->on('categories')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedInteger('shelf_id')->nullable();
            $table->foreign('shelf_id')
                ->on('shelfs')
                ->references('id')
                ->onUpdate('cascade')
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
        Schema::dropIfExists('books');
    }
}
