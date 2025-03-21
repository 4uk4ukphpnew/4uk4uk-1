<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Model\{UserMarketplaceAdFilter, UserMarketplaceAdCategory};
use App\Observers\{UserMarketplaceAdFilterObserver, UserMarketplaceAdCategoryObserver};

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        UserMarketplaceAdFilter::observe(UserMarketplaceAdFilterObserver::class);
        UserMarketplaceAdCategory::observe(UserMarketplaceAdCategoryObserver::class);

        parent::boot();
    }
}
