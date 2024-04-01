@extends('layouts.generic')

@section('page_title', __(''))
@section('share_url', route('home'))
@section('share_title', getSetting('site.name') . ' - ' . getSetting('site.slogan'))
@section('share_description', getSetting('site.description'))
@section('share_type', 'article')
@section('share_img', GenericHelper::getOGMetaImage())
@section('styles')
    {!!
        Minify::stylesheet([
            '/css/marketplace.css'
         ])->withFullUrl()
    !!}
    <style type="text/css">
        .accordion-button { padding: 10px !important; }
    </style>
@stop
@section('content')
    <div class="container-fluid pt-4">
        <div class="page-content-wrapper pb-5">
          <div class="px-2 px-md-4">
            <div class="row" style="margin: 15px;">
              @include('marketplace.partials.location_filter', ['countries' => $countries])


              @if (is_countable($ads) && count($ads))
                  @foreach($ads as $ad)
                      <div class="col-lg-2 mb-2 mb-lg-0 bg-image hover-zoom rounded  rounded mb-4">

                          <a href="{{route('marketplace.show',['id'=>$ad->id])}}">
                            <img src="/storage/{{ $ad->featured_image}}" class="w-100" alt="...">
                            <div class="mask text-light" style="margin: 15px;">


                              <h4><span class="material-symbols-rounded" style="--mdb-text-opacity: .4; color: #EC407A; font-size: 40px; ">fiber_new</span></h4>
                                  <h4><span class="material-symbols-rounded" style="--mdb-text-opacity: .4; color: #7E57C2; font-size: 35px;">videocam</span></h4>


                                  @if ($ad->is_verified)
                                      <h5><span class="material-symbols-rounded" style="--mdb-text-opacity: .4; color: #536DFE; font-size: 35px;">verified</span></h5>
                                  @else
                                      <h5><span class="material-symbols-rounded" style="--mdb-text-opacity: .4; color: #2e2e2e; font-size: 35px;">release_alert</span></h5>
                                  @endif

                              </div>

                          </a>
                      </div>

                  @endforeach
              @endif
            </div>
            </div>
        </div>
    </div>
@stop
