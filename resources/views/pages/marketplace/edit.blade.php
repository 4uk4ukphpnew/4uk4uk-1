@extends('layouts.user-no-nav')
@section('page_title', __('Edit Ad'))

@section('styles')
    {!!
        Minify::stylesheet([
            '/css/pages/settings.css',
            '/libs/dropzone/dist/dropzone.css',
         ])->withFullUrl()
    !!}
@stop

@section('scripts')
    {!!
        Minify::javascript([
            '/js/suggestions.js',
            //(Route::currentRouteName() =='my.ads.create' ? '/js/posts/create.js' : '/js/posts/edit.js'),
            '/libs/dropzone/dist/dropzone.js',
            '/js/FileUpload.js',

         ])->withFullUrl()
    !!}
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 mb-5 mb-lg-0 min-vh-100 mt-1 mt-md-0 pl-md-0 pr-md-0 content-wrapper">
                <div class="container" style="margin: 30px;">
                    <form method="PUT" action="{{route('my.ads.update', ['id' => $ad->id])}}">
                        @csrf
                        @include('elements.dropzone-dummy-element')

                        <div class="row mb-4">
                            <div class="col">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $ad->first_name }}" />
                                    <label class="form-label" for="first_name">First name</label>
                                </div>
                            </div>
                            <div class="col">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $ad->first_name }}" />
                                    <label class="form-label" for="last_name">Last name</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <div class="form-outline ckeditor-input-title mb-4" data-mdb-input-init>
                                    <textarea name="title" class="form-control" id="title" rows="4"></textarea>
                                    <label class="form-label" for="title">Ad subject</label>
                                </div>
                            </div>
                            <hr>
                            <div class="col">
                                <div class="form-outline ckeditor-input-description mb-4" data-mdb-input-initsss>
                                    <textarea name="description" class="form-control ckeditor-input" id="description" rows="4"></textarea>
                                    <label class="form-label" for="description">Ad description</label>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <br>
                        <br>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-check form-switch form-outline">
                                    <input class="form-check-input" type="checkbox" name="is_smoker" role="switch" id="is_smoker" />
                                    <label class="form-check-label" for="is_smoker">Smoking</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check form-switch form-outline">
                                    <input class="form-check-input" type="checkbox" name="is_drinker" role="switch" id="is_drinker" />
                                    <label class="form-check-label" for="is_drinker">Drinking</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check form-switch form-outline">
                                    <input class="form-check-input" type="checkbox" name="has_tattoo" role="switch" id="has_tattoo" />
                                    <label class="form-check-label" for="has_tattoo">Tattoos</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check form-switch form-outline">
                                    <input class="form-check-input" type="checkbox" name="has_piercing" role="switch" id="has_piercing" />
                                    <label class="form-check-label" for="has_piercing">Piercings</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="data-mdb-input-init form-outline">
                                    <select class=" form-control" id="gender_id" name="gender_id">
                                        @if (is_countable ($genders) && $genders->count ())
                                            @foreach ($genders as $gender)
                                                <option value="{{ $gender->id }}">{{ $gender->gender_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="text" name="gender_pronoun" id="gender_pronoun" class="form-control" />
                                    <label class="form-label" for="gender_pronoun">Gender Pronoun</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <div class="data-mdb-input-init form-outline">
                                    <select class=" form-control" id="country_id" name="country_id">
                                        @if (is_countable ($countries) && $countries->count ())
                                            @foreach ($countries as $country)
                                                @if ($country->id === 1)
                                                    @continue
                                                @endif
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                        </div>

                        @if(session('success'))
                            <div class="alert alert-success text-white font-weight-bold mt-2" role="alert">
                                {{session('success')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <br>
                        <br>
                        <button class="btn btn-block rounded mr-0" style="background: #65f7b9; color: #000;" type="submit" >{{__('Save')}}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
@stop
