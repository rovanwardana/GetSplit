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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // creator
            $table->string('name');
            $table->string('type'); // food, transport, dll
            $table->date('bill_date');
            $table->date('due_date')->nullable();
            $table->enum('split_method', ['equal', 'custom'])->default('equal');
            $table->decimal('subtotal', 10, 2)->default(0);

            $table->decimal('tax', 5, 2)->default(0); 
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('total_amount', 10, 2)->default(0);
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};