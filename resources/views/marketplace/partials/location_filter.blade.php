
<div class="col-md-3">
    @include('marketplace.partials.search')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <div class="accordion accordion-borderless list-group-small" id="countries-filter-accordeon">
                @if (is_countable($countries) && count($countries))
                    @foreach($countries as $country)
                        @if ($country->id === 1)
                            @continue
                        @endif
                      <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-accordeon-{{ $country->id }}">
                              <button data-mdb-collapse-init class="accordion-button" type="button" data-mdb-toggle="collapse"
                                data-mdb-target="#panel-open-collapse-{{ $country->id }}" aria-expanded="true" aria-controls="panel-open-collapse-{{ $country->id }}">
                                <a href="{{route('marketplace.indexByLocation',['location'=>strtolower($country->country_code)])}}"><i class="flag flag-{{ strtolower($country->country_code) }}"></i>&nbsp;&nbsp;{{ $country->name }}</a>
                              </button>
                            </h2>
                            <div id="panel-open-collapse-{{ $country->id }}" class="accordion-collapse collapse " aria-labelledby="heading-accordeon-{{ $country->id }}" style="border-left: 3px solid #cb2845;">
                                <div class="accordion-body">
                                  <ul class="list-group list-group-light list-group-small fw-light">
                                      @if (is_countable ($country->cities) && $country->cities->count ())
                                          @foreach ($country->cities as $city)
                                              <li class="list-group-item ">
                                                  <a href="{{route('marketplace.indexByLocation',['location'=>strtolower($city->city_name)])}}" class="fw-light text-center">
                                                      {{ $city->city_name }}&nbsp;&nbsp;({{ $city->user_marketplace_ads->count() }})</span>
                                                  </a>
                                              </li>
                                          @endforeach
                                      @endif

                                  </ul>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
              </div>
        </div>
    </div>
</div>
