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
        Schema::create('bussines_unit', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('street');
            $table->integer('number');
            $table->string('state');
            $table->string('city');
            $table->string('neighborhood');
            $table->string('zipcode');
            $table
            ->foreignUuid('user_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bussines_unit');
    }
};
