<?php

namespace App\Observers;

use App\Model\{UserMarketplaceAdCategory, UserMarketplaceAdFilter};
use Throwable;

class UserMarketplaceAdFilterObserver
{
    /**
     * Handle the UserMarketplaceAdFilter "created" event.
     *
     * @param  \App\Model\UserMarketplaceAdFilter  $UserMarketplaceAdFilter
     * @return void
     */
    public function created(UserMarketplaceAdFilter $UserMarketplaceAdFilter)
    {
        try {

        } catch (Throwable $ex) {

        }
    }

    /**
     * Handle the UserMarketplaceAdFilter "updated" event.
     *
     * @param  \App\Model\UserMarketplaceAdFilter  $UserMarketplaceAdFilter
     * @return void
     */
    public function updated(UserMarketplaceAdFilter $UserMarketplaceAdFilter)
    {
        try {

        } catch (Throwable $ex) {

        }
    }

    /**
     * Handle the UserMarketplaceAdFilter "deleted" event.
     *
     * @param  \App\Model\UserMarketplaceAdFilter  $UserMarketplaceAdFilter
     * @return void
     */
    public function deleted(UserMarketplaceAdFilter $UserMarketplaceAdFilter)
    {
        try {

        } catch (Throwable $ex) {

        }
    }

    /**
     * Handle the UserMarketplaceAdFilter "restored" event.
     *
     * @param  \App\Model\UserMarketplaceAdFilter  $UserMarketplaceAdFilter
     * @return void
     */
    public function restored(UserMarketplaceAdFilter $UserMarketplaceAdFilter)
    {
        //
    }

    /**
     * Handle the UserMarketplaceAdFilter "force deleted" event.
     *
     * @param  \App\Model\UserMarketplaceAdFilter  $UserMarketplaceAdFilter
     * @return void
     */
    public function forceDeleted(UserMarketplaceAdFilter $UserMarketplaceAdFilter)
    {
        try {

        } catch (Throwable $ex) {

        }
    }
}
