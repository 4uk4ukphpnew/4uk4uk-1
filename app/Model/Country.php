<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\{UserMarketplaceAd, UserMarketplaceAdCity};

class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pivot', 'created_at', 'updated_at',
    ];

    protected $with = ['cities'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];

    public function taxes()
    {
        return $this->belongsToMany('App\Model\Tax', 'country_taxes')->select(['id', 'name', 'percentage', 'type']);
    }

    public function user_marketplace_ads () {
      return $this->hasMany (UserMarketplaceAd::class);
    }

    public function cities () {
      return $this->hasMany (UserMarketplaceAdCity::class);
    }
}
