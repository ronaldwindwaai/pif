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
            $table->enum('type_of_meeting',[
                'Single',
                'Specific Days',
                'Weekly',
                'Monthly',
            ]);
            $table->text('date');
            $table->time('start_time');
            $table->time('end_time')->nullable();
            $table->text('description');
            $table->longText('budget')->nullable();
            $table->string('venue')->nullable();
            $table->enum('status',[
                'pending',
                'completed',
                'postponed',
                'cancelled',
            ]
            )->default('pending');
            $table->foreignId('user_id')
                    ->constrained('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId('project_id')
                    ->constrained('projects')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId('programme_id')
                    ->constrained('programmes')
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
        Schema::dropIfExists('meetings');
    }
}
