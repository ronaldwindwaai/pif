<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->dateTime('starting_date');
            $table->dateTime('end_date')->nullable();
            $table->text('description');
            $table->longText('file')->nullable();
            $table->string('venue')->nullable();
            $table->foreignId('user_id')
            ->constrained('users');
            $table->foreignId('project_id')
                ->constrained('projects');
            $table->foreignId('programme_id')
                ->constrained('programme');

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
        Schema::dropIfExists('meetings');
    }
}
