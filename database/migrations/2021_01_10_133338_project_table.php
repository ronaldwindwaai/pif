<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->dateTime('date_from');
            $table->dateTime('date_to');
            $table->text('objective');
            $table->longText('file')->nullable();
            $table->foreignId('user_id')
                    ->constrained('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId('programme_id')
                    ->constrained('programmes')
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
        Schema::dropIfExists('projects');
    }
}
