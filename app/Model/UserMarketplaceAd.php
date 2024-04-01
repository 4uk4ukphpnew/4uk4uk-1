<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\{User, UserGender, Country, UserMarketplaceAdImage};
use Spatie\MediaLibrary\HasMedia\{HasMedia, HasMediaTrait};
use Conner\Likeable\Likeable;
use CrixuAMG\Mentions\Models\Traits\HasMentionsTrait;
use Rinvex\Categories\Traits\Categorizable;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserMarketplaceAd extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, HasMediaTrait, Likeable, HasMentionsTrait, Categorizable;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_marketplace_ads';

    protected $fillable = ['user_id', 'country_id', 'gender_id', 'gender_pronoun', 'title', 'description', 'active', 'is_verified', 'is_vip', 'is_smoker', 'is_drinker', 'has_tattoo', 'has_piercing'];
    protected $appends = ['photos_list'];
    /*
     * Relationships
     */

    protected $with = ['photos',  'gender'];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vzt()
    {
        return visits($this);
    }

    public function visits()
    {
        return visits($this)->relation();
    }

    public function gender () {
        return $this->belongsTo (UserGender::class, 'gender_id');
    }

    public function country () {
        return $this->belongsTo (Country::class, 'country_id');
    }

    public function photos () {
        return $this->hasMany (UserMarketplaceAdImage::class, 'user_marketplace_ad');
    }

    public function getPhotosListAttribute() {
        return json_encode(collect($this->photos->pluck('image', 'id'))->toArray(), true);
    }

    public function setPhotosListAttribute(?string $images) {


      if (preg_match('/(.+)\/remove$/', request()->path())) {
          UserMarketplaceAdImage::find(request()->input('realid'))->delete ();
      } else {
        $images = @json_decode ($images, true);

        if (\is_countable ($images)) {
            foreach ($images as $key => $value) {
                if (!is_countable ($value)) {
                    UserMarketplaceAdImage::updateOrCreate ([
                        'user_marketplace_ad' => $this->id,
                        'image' => $value
                    ]);

                    continue;
                }


            }
        }
      }

    }
}
