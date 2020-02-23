<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLoyaltyColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('distributors', function (Blueprint $table) {
            $table->bigInteger('loyalty')->default(0);
            $table->bigInteger('reward')->default(0);
            $table->bigInteger('coupon')->default(0);
            $table->bigInteger('transaction')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('distributors', function (Blueprint $table) {
            $table->dropColumn('loyalty');
            $table->dropColumn('reward');
            $table->dropColumn('coupon');
            $table->dropColumn('transaction');

        });
    }
}
