<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->enum('category', ['wait','running','pendency','done','other']);
            $table->string('time');
            $table->tinyInteger('notifications');
            $table->string('tag');
            $table->string('code');
            $table->string('title');
            $table->string('project');
            $table->date('expected_date');
            $table->string('description');
            $table->string('expected');
            $table->string('balance');
            $table->enum('status', ['in-time','alert','late']);
            $table->json('team')->default('{}');

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
        Schema::dropIfExists('tasks');
    }
};
