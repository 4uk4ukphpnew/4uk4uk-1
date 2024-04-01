<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMarketplaceAdsImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('user_marketplace_ads_images', function (Blueprint $table) {
            $table->increments ('id');
            $table->unsignedBigInteger ('user_marketplace_ad')->index ()->nullable ();
            $table->string ('image', 255);
            $table->integer ('order_number')->default (0);
            $table->timestamps ();

            $table->foreign ('user_marketplace_ad')
                ->references ('id')
                ->on ('user_marketplace_ads')
                ->onDelete ('cascade')
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
        Schema::dropIfExists('user_marketplace_ads_images');
    }
}
