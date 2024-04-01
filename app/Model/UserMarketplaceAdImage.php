<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\UserMarketplaceAd;

class UserMarketplaceAdImage extends Model {
    protected $table = 'user_marketplace_ads_images';
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_marketplace_ad', 'image', 'order_number',
    ];

    public function user_marketplace_ad () {
        return $this->belongsTo (UserMarketplaceAd::class, 'user_marketplace_ad');
    }
}
