<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->uuid('factor_id')->nullable(false);
            $table->foreign('factor_id')->references('id')->on('factors')->onDelete('cascade');
            $table->string('ref_num')->nullable(false);
            $table->string('transaction_id')->nullable(false);
            $table->string('card_number')->nullable(false);
            $table->string('tracking_code')->nullable(false);
            $table->string('amount')->nullable(false);
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
        Schema::dropIfExists('payments');
    }
};
