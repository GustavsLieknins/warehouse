<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->timestamps();
        });
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            
        });
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('quantity');
            $table->integer('price');
            $table->timestamps();
            $table->foreignId(column: 'transaction_id')->constrained('transactions')->onDelete('cascade');
            $table->foreignId(column: 'status_id')->constrained('statuses')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('statuses');
        Schema::dropIfExists('categories');
    }
}

