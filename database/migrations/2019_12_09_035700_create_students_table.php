<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('identity',150);
            $table->string('firstname');
            $table->string('lastname');
            $table->enum('gender',['Masculino','Femenino']); 
            $table->date('finish'); 
            $table->string('representant'); 
            $table->string('mobileno'); 
            $table->text('address');
            $table->unsignedBigInteger('curse_id');
            $table->timestamps();

            $table->foreign('curse_id')->references('id')->on('curses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
