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
                'Single Day',
                'Specific Days',
                'Weekly',
                'Monthly',
            ]);
            $table->text('date');
            $table->time('start_time');
            $table->time('end_time')->nullable();
            $table->date('participants_arrival_date')->nullable();
            $table->date('secretariat_arrival_date')->nullable();
            $table->date('participants_departure_date')->nullable();
            $table->date('secretariat_departure_date')->nullable();
            $table->text('description');
            $table->boolean('is_breakout_room_required')->default(false);
            $table->boolean('is_recording_required')->default(false);
            $table->boolean('is_attendance_report_required')->default(false);
            $table->boolean('is_members_airfare_required')->default(false);
            $table->boolean('is_secretariat_airfare_required')->default(false);
            $table->string('proposed_funding')->nullable();
            $table->string('venue')->nullable();
            $table->string('perdiem_rate')->nullable();
            $table->string('num_of_participants')->nullable();
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
            $table->foreignId('partner_id')
                    ->nullable()
                    ->constrained('partners')
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
