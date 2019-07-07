<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loanings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->date('loaning_date');
            $table->date('returning_date');
            $table->longText('description');
            $table->enum('returning_status',['late','on_time']);
            $table->string('fine')->nullable();
            $table->integer('qty')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedInteger('book_id')->nullable();
            $table->foreign('book_id')
                ->on('books')
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
        Schema::dropIfExists('loanings');
    }
}
