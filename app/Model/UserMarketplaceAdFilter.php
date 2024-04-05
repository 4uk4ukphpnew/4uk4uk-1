<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\UserMarketplaceAdCategory;

class UserMarketplaceAdFilter extends Model {
    protected $table = 'user_marketplace_ads_filters';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'category_id', 'active'];

    public function category () {
        return $this->belongsTo (UserMarketplaceAdCategory::class, 'category_id');
    }
}
