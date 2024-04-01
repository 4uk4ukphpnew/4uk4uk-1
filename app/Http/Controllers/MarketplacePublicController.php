<?php

namespace App\Http\Controllers;

use App\Model\{Country, UserMarketplaceAd, UserMarketplaceAdCity};
use Illuminate\Http\Request;
use View;

class MarketplacePublicController extends Controller {
    /**
     * Renders main lists page.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request) {
        //dd(UserMarketplaceAd::all());
        return view('marketplace.index', [
            'ads' => UserMarketplaceAd::where('active', '=', 1)->get (),
            'countries' => Country::all()
        ]);
    }

    /**
     * Renders main lists page.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexByLocation(Request $request, string $location) {
        $country = Country::where ('country_code', '=', strtoupper($location))->first ();

        if (!$country) {
            $city = UserMarketplaceAdCity::where('city_name', '=', ucfirst($location))->first();

            if (!$city) {
                return view('marketplace.index', [
                    'ads' => collect ([]),
                    'countries' => Country::all()
                ]);
            }

            return view('marketplace.index', [
                'ads' => UserMarketplaceAd::where(['active' => 1, 'city_id' => $city->id])->get (),
                'countries' => Country::all()
            ]);
        }

        return view('marketplace.index', [
            'ads' => UserMarketplaceAd::where(['active' => 1, 'country_id' => $country->id])->get (),
            'countries' => Country::all()
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
            'countries' => Country::all()
        ]);
    }

    /**
     * Renders search results page.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request) {
        $keyword = $request->input ('keyword');
        
        return view('marketplace.index', [
            'ads' => UserMarketplaceAd::where('active', '=', 1)->get (),
            'countries' => Country::all()
        ]);
    }
}
