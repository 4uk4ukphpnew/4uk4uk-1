<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use App\Model\{Country, UserGender, UserMarketplaceAd, UserMarketplaceAdsCity};

class MarketplaceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function createUserAd (array $data, bool $return = true) {
        $newUserAd  = new UserMarketplaceAd;
    }
}
