<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_code');
            $table->foreignId('user_id')->constrained();
            $table->bigInteger('total_price')->default(0);
            $table->bigInteger('total_paid')->default(0);
            $table->foreignId('payment_method_id')->constrained();
            $table->foreignId('transaction_status_id')->constrained();
            $table->unsignedBigInteger('voucher_id')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
