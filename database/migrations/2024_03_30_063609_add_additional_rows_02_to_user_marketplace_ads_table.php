<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalRows02ToUserMarketplaceAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_marketplace_ads', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id')->nullable()->after ('description');
            $table->unsignedBigInteger('gender_id')->nullable()->after('country_id');
            $table->string('gender_pronoun')->nullable()->after('gender_id');

            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade')
            ;
            $table->foreign('gender_id')
              ->references('id')
              ->on('user_genders')
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
