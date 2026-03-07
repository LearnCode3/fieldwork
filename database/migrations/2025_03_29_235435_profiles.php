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
        Schema::create('profiles', function (Blueprint $table){
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('phoneNumber');
            $table->string('university');
            $table->string('level');
            $table->string('course');
            $table->integer('year');
            $table->string('regno');
            $table->string('location');
            $table->string('company');
            $table->string('department');
            $table->string('profileImage')->nullable();
            $table->date('fieldStart');
            $table->date('fieldEnd');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');

    }
};
