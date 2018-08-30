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
            $table->increments('id');

            $table->string('name');
            $table->string('college');
            $table->integer('college_id')->nullable();
            $table->string('mobile');
            // $table->string('ticket_id');
            $table->boolean('isLocalite')->default(false);
            $table->string('place');
            $table->string('amountPaid')->nullable();

            $table->string('sex')->nullable();

            $table->string('email')->unique();
            $table->string('password')->nullable();
            
            $table->rememberToken();
            
            $table->string('team')->nullable();

            // $table->string('foodHash1');
            // $table->boolean('foodHash1Attend')->default(false);
            
            // $table->string('foodHash2');
            // $table->boolean('foodHash2Attend')->default(false);

            $table->string('registHash')->nullable();
            // $table->boolean('attend')->default(false);
            // $table->boolean('registered')->default(false);

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
        Schema::dropIfExists('students');
    }
}
