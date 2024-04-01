<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalRows04ToUserMarketplaceAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_marketplace_ads', function (Blueprint $table) {
            $table->unsignedBigInteger('city_id')->nullable()->after ('country_id');
            $table->foreign('city_id')
                ->references('id')
                ->on('user_marketplace_ads_cities')
                ->onDelete('cascade')
            ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_marketplace_ads', function (Blueprint $table) {
            //
        });
    }
}
