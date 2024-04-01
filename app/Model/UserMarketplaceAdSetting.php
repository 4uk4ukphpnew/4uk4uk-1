<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\UserMarketplaceAd;

class UserMarketplaceAdSetting extends Model {
    protected $table = 'user_marketplace_ads_settings';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
}
