<?php

declare(strict_types=1);

return [

    // Manage autoload migrations
    'autoload_migrations' => true,

    // Categories Database Tables
    'tables' => [

        'categories' => 'user_marketplace_ads_categories',
        'categorizables' => 'categorizables',

    ],

    // Categories Models
    'models' => [
        'category' => App\Model\UserMarketplaceAdCategory::class,
    ],

];
