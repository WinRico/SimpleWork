<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('full_text');
            $table->string('title');
            $table->string('namedCompany');
            $table->date('deadline');
            $table->integer('statusId');
            $table->timestamp('date_add');
            $table->date('dead_start_work');
            $table->date('deadUpdate');
            $table->integer('projectId');
            $table->integer('categoryId');
            $table->integer('userId');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
