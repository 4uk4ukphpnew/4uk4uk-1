<?php

namespace App\Observers;

use App\Model\{UserMarketplaceAdCategory, UserMarketplaceAdFilter};

class UserMarketplaceAdCategoryObserver
{
    /**
     * Handle the UserMarketplaceAdCategory "created" event.
     *
     * @param  \App\Model\UserMarketplaceAdCategory  $UserMarketplaceAdCategory
     * @return void
     */
    public function created(UserMarketplaceAdCategory $UserMarketplaceAdCategory)
    {
        if (!$UserMarketplaceAdCategory->parent_id) {
            try {
                UserMarketplaceAdFilter::create ([
                    'category_id' => $UserMarketplaceAdCategory->id,
                    'name' => json_encode($UserMarketplaceAdCategory->getTranslations('name'))
                ]);
            } catch (Throwable $ex) {

            }
        }
    }

    /**
     * Handle the UserMarketplaceAdCategory "updated" event.
     *
     * @param  \App\Model\UserMarketplaceAdCategory  $UserMarketplaceAdCategory
     * @return void
     */
    public function updated(UserMarketplaceAdCategory $UserMarketplaceAdCategory)
    {
        if (!$UserMarketplaceAdCategory->parent_id) {
            try {
                $filter = UserMarketplaceAdFilter::where('category_id', '=', $UserMarketplaceAdCategory->id)->first();

                if ($filter instanceof UserMarketplaceAdFilter) {
                    $filter->update(['name' => json_encode($UserMarketplaceAdCategory->getTranslations('name'))]);
                } else {
                    UserMarketplaceAdFilter::create ([
                        'category_id' => $UserMarketplaceAdCategory->id,
                        'name' => json_encode($UserMarketplaceAdCategory->getTranslations('name'))
                    ]);
                }
            } catch (Throwable $ex) {

            }
        }
    }

    /**
     * Handle the UserMarketplaceAdCategory "deleted" event.
     *
     * @param  \App\Model\UserMarketplaceAdCategory  $UserMarketplaceAdCategory
     * @return void
     */
    public function deleted(UserMarketplaceAdCategory $UserMarketplaceAdCategory)
    {
        if (!$UserMarketplaceAdCategory->parent_id) {
            try {
                UserMarketplaceAdFilter::where('category_id', '=', $UserMarketplaceAdCategory->id)
                    ->first()
                    ->delete()
                ;
            } catch (Throwable $ex) {

            }
        }
    }

    /**
     * Handle the UserMarketplaceAdCategory "restored" event.
     *
     * @param  \App\Model\UserMarketplaceAdCategory  $UserMarketplaceAdCategory
     * @return void
     */
    public function restored(UserMarketplaceAdCategory $UserMarketplaceAdCategory)
    {
        //
    }

    /**
     * Handle the UserMarketplaceAdCategory "force deleted" event.
     *
     * @param  \App\Model\UserMarketplaceAdCategory  $UserMarketplaceAdCategory
     * @return void
     */
    public function forceDeleted(UserMarketplaceAdCategory $UserMarketplaceAdCategory)
    {
        if (!$UserMarketplaceAdCategory->parent_id) {
            try {
                UserMarketplaceAdFilter::where('category_id', '=', $UserMarketplaceAdCategory->id)
                    ->delete()
                ;
            } catch (Throwable $ex) {

            }
        }
    }
}
