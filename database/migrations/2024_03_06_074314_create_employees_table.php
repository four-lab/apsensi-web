<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 18)->unique();
            $table->string('email', 100)->unique();
            $table->string('username', 50);
            $table->string('password');
            $table->string('fullname', 100);
            $table->string('birthplace', 75);
            $table->date('birthdate');
            $table->json('photos')->default(new Expression('JSON_ARRAY()'));
            $table->enum('gender', ['male', 'female']);
            $table->longText('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
