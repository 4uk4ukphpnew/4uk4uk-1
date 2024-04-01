<?php

namespace App\Http\Controllers;

use App\Model\{Country, UserGender, UserMarketplaceAd, UserMarketplaceAdsCity};
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Providers\GenericHelperServiceProvider;
use App\Providers\AttachmentServiceProvider;
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
            'ad' => $ad
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
    public function edit(int $id)
    {
        $canEditAd = true;
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
            'ad' => UserMarketplaceAd::find($id),
            'countries' => Country::all (),
            'genders' => UserGender::all ()
        ]);
    }

    public function store (Request $request) {

    }

    public function update (Request $request, int $id) {

    }

    public function delete (Request $request, int $id) {

    }
}
