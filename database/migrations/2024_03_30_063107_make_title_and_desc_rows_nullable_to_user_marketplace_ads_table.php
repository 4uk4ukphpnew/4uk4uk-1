<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeTitleAndDescRowsNullableToUserMarketplaceAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_marketplace_ads', function (Blueprint $table) {
            $table->longText('title')->nullable()->change();
            $table->longText('description')->nullable()->change();
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
