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
        Schema::table('users', function (Blueprint $table) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('phone_no')->nullable();
                $table->enum('gender', ['male', 'female', 'other'])->nullable();
                $table->boolean('suspended')->default(false);
                $table->string('image')->nullable();
                $table->enum('status', ['active', 'inactive'])->default('active');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone_no', 'gender', 'suspended', 'image', 'status']);
        });
    }
};
