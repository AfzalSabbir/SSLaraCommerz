<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * CREATE TABLE `orders` (
     *    `id` int(11) NOT NULL,
     *    `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
     *    `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
     *    `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
     *    `amount` double DEFAULT NULL,
     *    `address` text COLLATE utf8_unicode_ci,
     *    `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
     *    `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
     *    `currency` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
     * ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
     *
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone', 20)->nullable();
            $table->double('amount')->nullable();
            $table->text('address')->nullable();
            $table->string('status', 10)->nullable();
            $table->string('transaction_id', 191)->nullable();
            $table->string('currency', 20)->nullable();
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
        Schema::dropIfExists('orders');
    }
};
