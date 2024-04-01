<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMarketplaceAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('user_marketplace_ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->longText('title');
            $table->longText('description');
            $table->tinyInteger('active')->default(1);

            $table->tinyInteger('is_vip')->default(0);
            $table->tinyInteger('is_smoker')->default(0);
            $table->tinyInteger('is_drinker')->default(0);
            $table->tinyInteger('has_piercing')->default(0);
            $table->tinyInteger('has_tattoo')->default(0);

            $table->softDeletes($column = 'deleted_at', $precision = 0);
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
        Schema::table('user_marketplace_ads', function (Blueprint $table) {
            //
        });
    }
}
