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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable(); 
            $table->unsignedBigInteger('category_id')->nullable();  
              // Define the foreign key constraint
            $table->foreign('category_id')
              ->references('id')
              ->on('categories')
              ->onDelete('set null'); // Optional: if c          
            $table->string('image')->nullable();
            $table->string('mrp_price')->nullable(); 
            $table->string('selling_price')->nullable(); 
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['category_id']);

            // Drop the category_id column
            $table->dropColumn('category_id');
        });
    }
};
