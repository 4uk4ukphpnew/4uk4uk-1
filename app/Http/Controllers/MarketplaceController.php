<?php

namespace App\Http\Controllers;

use App\Model\{Country, UserGender, UserMarketplaceAd, UserMarketplaceAdsCity};
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Providers\GenericHelperServiceProvider;
use App\Providers\AttachmentServiceProvider;
use App\Providers\MarketplaceServiceProvider;
use App\Http\Requests\{UserMarketplaceAdRequest, DeleteUserMarketplaceAdRequest};
use JavaScript,View;

class MarketplaceController extends Controller {
    /**
     * Renders main lists page.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request) {
        $ads = UserMarketplaceAd::where ('user_id', '=', Auth::user()->id)->get ();

        return view('pages.marketplace.index', [
            'ads' => $ads,
            'user' => Auth::user()
        ]);
    }

    /**
     * Renders main lists page.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAd(int $id) {
        $ad = UserMarketplaceAd::find($id);

        if (!$ad) {
            abort(404);
        }

        return view('marketplace.show', [
            'ad' => $ad,
            'countries' => Country::all (),
            'genders' => UserGender::all ()
        ]);
    }

    /**
     * Renders the post create page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $canCreateAd = true;

        if(getSetting('site.enforce_user_identity_checks')){
            if(!GenericHelperServiceProvider::isUserVerified()){
                $canCreateAd = false;
            }
        }
        Javascript::put([
            'isAllowedToCreateAd' => $canCreateAd,
            'mediaSettings' => [
                'allowed_file_extensions' => '.' . str_replace(',', ',.', AttachmentServiceProvider::filterExtensions('videosFallback')),
                'max_file_upload_size' => (int)getSetting('media.max_file_upload_size'),
                'use_chunked_uploads' => (bool)getSetting('media.use_chunked_uploads'),
                'upload_chunk_size' => (int)getSetting('media.upload_chunk_size'),
                'max_post_description_size' => (int)getSetting('feed.min_post_description')
            ],
        ]);

        return view('pages.marketplace.create', [
            'countries' => Country::all (),
            'genders' => UserGender::all ()
        ]);
    }

    /**
     * Renders the post edit page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id) {
        $canEditAd = true;
        $ad = UserMarketplaceAd::find($id);

        if (!$ad) {
            abort(404);
        }

        if(getSetting('site.enforce_user_identity_checks')){
            if(!GenericHelperServiceProvider::isUserVerified()){
                $canEditAd = false;
            }
        }
        Javascript::put([
            'isAllowedToCreateAd' => $canEditAd,
            'mediaSettings' => [
                'allowed_file_extensions' => '.' . str_replace(',', ',.', AttachmentServiceProvider::filterExtensions('videosFallback')),
                'max_file_upload_size' => (int)getSetting('media.max_file_upload_size'),
                'use_chunked_uploads' => (bool)getSetting('media.use_chunked_uploads'),
                'upload_chunk_size' => (int)getSetting('media.upload_chunk_size'),
                'max_post_description_size' => (int)getSetting('feed.min_post_description')
            ],
        ]);

        return view('pages.marketplace.edit', [
            'ad' => $ad,
            'countries' => Country::all (),
            'genders' => UserGender::all ()
        ]);
    }

    public function store (UserMarketplaceAdRequest $request) {
        $canStoreAd = true;

        if(getSetting('site.enforce_user_identity_checks')){
            if(!GenericHelperServiceProvider::isUserVerified()){
                $canStoreAd = false;
            }
        }
        dd($request);
        $newUserAd = UserMarketplaceAd::create ([
            'user_id' => Auth::user()->id,
            'country_id' => $request->input ('country_id'),
            'city_id' => $request->input ('city_id'),
            'first_name' => $request->input ('first_name'),
            'last_name' => $request->input ('last_name'),
            'title' => $request->input ('title'),
            'description' => $request->input ('description'),
            'featured_image' => $request->input ('featured_image'),
            'active' => $request->input ('active') == 'on' ? 1 : 0,
            'gender_id' => $request->input ('gender_id'),
            'gender_pronoun' => $request->input ('gender_pronoun'),
            'is_smoker' => $request->input ('is_smoker') == 'on' ? 1 : 0,
            'is_drinker' => $request->input ('is_drinker') == 'on' ? 1 : 0,
            'has_tattoo' => $request->input ('has_tattoo') == 'on' ? 1 : 0,
            'has_piercing' => $request->input ('has_piercing') == 'on' ? 1 : 0,
        ]);

        $request->session()->flash('hasBeenCreated', true);
        $request->session()->flash('hasBeenCreateddMsg', '');

        return redirect()
            ->action([MarketplaceController::class, 'edit'], ['id' => $id])
        ;
    }

    public function update (UserMarketplaceAdRequest $request, int $id) {
        $canUpdateAd = true;
        $ad = UserMarketplaceAd::find($id);

        if (!$ad) {
            abort(404);
        }

        $request->session()->flash('hasBeenUpdated', true);
        $request->session()->flash('hasBeenUpdatedMsg', '');

        return redirect()
            ->action([MarketplaceController::class, 'edit'], ['id' => $id])
        ;
    }

    public function delete (DeleteUserMarketplaceAdRequest $request, int $id) {
        $canDeleteAd = true;
        $ad = UserMarketplaceAd::find($id);

        if (!$ad || $ad->trashed()) {
            abort(404);
        }
        $ad->delete ();

        $request->session()->flash('hasBeenDeleted', true);
        $request->session()->flash('hasBeenDeletedMsg', '');

        return redirect()
            ->action(MarketplaceController::class, 'index')
        ;
    }
}
