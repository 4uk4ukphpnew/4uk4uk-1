@extends('layouts.user-no-nav')
@section('styles')
    {!!
        Minify::stylesheet([
            '/css/marketplace.css'
         ])->withFullUrl()
    !!}
@stop

@section('content')
    <div class="">
        <div class="col-6 col-md-6 col-lg-12 mb-5 mb-lg-0 min-vh-100 pl-md-0 pr-md-0 settings-content">
            <div class="px-2 px-md-4">
                <div class="row" style="margin: 15px;">
                  @if (is_countable($ads) && count($ads))
                      @foreach($ads as $ad)
                          <div class="col-lg-4 mb-4 mb-lg-0 bg-image hover-zoom rounded  rounded mb-4">

                              <a href="#">
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

    <div class="d-none">
        <ion-icon name="heart"></ion-icon>
        <ion-icon name="heart-outline"></ion-icon>
    </div>

@stop
