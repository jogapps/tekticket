<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_transactions', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('ticket_id');
            $table->string('transaction_status');
            $table->string('transaction_for');
            $table->string('transaction_via');
            $table->string('reference');
            $table->double('amount')->default(0);
            $table->string('paid_at')->nullable();
            $table->string('transaction_id');
            $table->string('ip_address')->nullable();
            $table->string('attempts')->nullable();
            $table->string('channel');
            $table->string('currency')->default('NGN');
            $table->double('fees')->default(0.00);
            $table->string('customer_email');
            $table->string('customer_code')->nullable();
            $table->string('transaction_date');
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
        Schema::dropIfExists('ticket_transactions');
    }
}
