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
        Schema::create('bill_participants', function (Blueprint $table) {
            $table->id();

            $table->foreignId('bill_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->decimal('amount_to_pay', 10, 2)->default(0);
            $table->enum('payment_status', ['Pending', 'Paid'])->default('Pending');

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill_participants');
    }
};
