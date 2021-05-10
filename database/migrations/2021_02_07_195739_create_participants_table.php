<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->dateTime('registration_date');
            $table->string('country_code');
            $table->string('country');
            $table->string('tel')->nullable();
            $table->string('organization');
            $table->string('job_title')->nullable();
            $table->foreignId('meeting_id')
                    ->constrained('meetings')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('file_id')
                    ->nullable()
                    ->constrained('files')
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
        Schema::dropIfExists('participants');
    }
}
