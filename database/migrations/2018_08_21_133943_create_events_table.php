<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->unique();
            $table->string('commonName')->unique();
            $table->longText('description');
            $table->string('location');
            $table->string('qrCodeHash');

            $table->string('time');

            $table->boolean('if_team')->default(false);
            $table->string('members')->default(0);

            $table->string('organizer');
            $table->string('mobile');

            $table->string('photo');
            $table->longText('rules');
            $table->longText('rulesText');

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
        Schema::dropIfExists('events');
    }
}
