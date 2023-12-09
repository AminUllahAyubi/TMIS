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
        Schema::create('theses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description');
            $table->binary('image')->nullable();
            // $table->integer('supervisor_id')->default(0);
            // $table->bigInteger('group_id')->default(0);
            $table->binary('proposal')->nullable();
            $table->binary('book')->nullable();
            $table->year('year')->nullable();
            $table->string('status')->nullable();
            $table->text('used_technology')->nullable();
            $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theses');
    }
};
