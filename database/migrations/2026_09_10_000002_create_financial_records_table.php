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
        if (!Schema::hasTable('financial_records')) {
            Schema::create('financial_records', function (Blueprint $table) {
                $table->id();
                $table->enum('type', ['income', 'expense'])->default('expense');
                $table->string('category')->default('other');
                $table->string('title');
                $table->decimal('amount', 15, 2)->default(0);
                $table->date('transaction_date');
                $table->string('payment_method')->default('Transfer Bank');
                $table->string('reference_number')->nullable();
                $table->unsignedBigInteger('invoice_id')->nullable();
                $table->text('notes')->nullable();
                $table->string('receipt_path')->nullable();
                $table->unsignedBigInteger('created_by')->nullable();
                $table->timestamps();

                $table->index('type');
                $table->index('category');
                $table->index('transaction_date');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_records');
    }
};
