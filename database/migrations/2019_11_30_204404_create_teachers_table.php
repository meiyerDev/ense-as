<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('identity',150)->unique();
            $table->string('firstname');
            $table->enum('gender',['M','F']); 
            $table->date('finish'); 
            $table->string('email',150)->unique(); 
            $table->string('mobileno'); 
            $table->text('address'); 
            $table->text('imageico')->nullable();
            $table->unsignedBigInteger('curse_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('curse_id')->references('id')->on('curses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
