<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalRows03ToUserMarketplaceAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_marketplace_ads', function (Blueprint $table) {
            $table->string ('first_name', 255)->after ('user_id')->nullable();
            $table->string ('last_name', 255)->after ('first_name')->nullable();
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
