<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\UserMarketplaceAd;

class UserGender extends Model
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

    ];

    public function user_marketplace_ads () {
      return $this->belongsToMany (UserMarketplaceAd::class);
    }
}
