<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMarketplaceAdsFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_marketplace_ads_filters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->json('name');
            $table->unsignedInteger('category_id')->unique();
            $table->tinyInteger('active')->default(0);
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('user_marketplace_ads_categories')
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
        Schema::dropIfExists('user_marketplace_ads_filters');
    }
}
