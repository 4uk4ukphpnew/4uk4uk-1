<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\UserMarketplaceAd;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserMarketplaceAdCity extends Model {
    use SoftDeletes;

    protected $table = 'user_marketplace_ads_cities';

    protected $with = ['user_marketplace_ads'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_id', 'city_name', 'active',
    ];

    protected $append = ['user_marketplace_ads'];

    protected $dates = ['deleted_at'];

    public function user_marketplace_ads () {
        return $this->hasMany (UserMarketplaceAd::class, 'city_id');
    }

    public function country () {
        return $this->belongsTo (Country::class, 'country_id');
    }
}
