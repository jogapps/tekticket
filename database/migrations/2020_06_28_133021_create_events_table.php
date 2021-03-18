<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('slug');
            $table->string('event_date');
            $table->longText('description');
            $table->longText('description_raw');
            $table->string('street_1');
            $table->string('city');
            $table->string('state');
            $table->string('country')->default('Nigeria');
            $table->boolean('featured')->default(false);
            $table->string('image')->nullable();
            $table->uuid('category_id');
            $table->uuid('organizer_id');
            $table->boolean('published')->default(true);
            $table->enum('status',['open','closed'])->default('open');
            $table->enum('ticket_status',['on sale','closed'])->default('on sale');
            $table->softDeletes();
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
