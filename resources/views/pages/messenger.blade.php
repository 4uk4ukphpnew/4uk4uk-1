@extends('layouts.user-no-nav')

@section('page_title', __('Messenger'))

@section('styles')
    {!!
        Minify::stylesheet([
            '/libs/@selectize/selectize/dist/css/selectize.css',
            '/libs/@selectize/selectize/dist/css/selectize.bootstrap4.css',
            '/libs/dropzone/dist/dropzone.css',
            '/libs/photoswipe/dist/photoswipe.css',
            '/libs/photoswipe/dist/default-skin/default-skin.css',
            '/css/pages/messenger.css',
            '/css/pages/checkout.css'
         ])->withFullUrl()
    !!}
@stop

@section('scripts')
    {!!
        Minify::javascript([
            '/js/messenger/messenger.js',
            '/js/messenger/elements.js',
            '/libs/@selectize/selectize/dist/js/standalone/selectize.min.js',
            '/libs/dropzone/dist/dropzone.js',
            '/js/FileUpload.js',
            '/js/plugins/media/photoswipe.js',
            '/libs/photoswipe/dist/photoswipe-ui-default.min.js',
            '/js/plugins/media/mediaswipe.js',
            '/js/plugins/media/mediaswipe-loader.js',
            '/libs/@joeattardi/emoji-button/dist/index.js',
            '/js/pages/lists.js',
            '/js/pages/checkout.js',
            '/libs/pusher-js-auth/lib/pusher-auth.js'
         ])->withFullUrl()
    !!}
@stop

@section('content')
    @include('elements.uploaded-file-preview-template')
    @include('elements.photoswipe-container')
    @include('elements.report-user-or-post',['reportStatuses' => ListsHelper::getReportTypes()])
    @include('elements.feed.post-delete-dialog')
    @include('elements.feed.post-list-management')
    @include('elements.messenger.message-price-dialog')
    @include('elements.checkout.checkout-box')
    @include('elements.attachments-uploading-dialog')
    @include('elements.messenger.locked-message-no-attachments-dialog')
    @include('elements.messenger.message-media-dialog')
    <div class="row">
        <div class=" col-12">
            <div class="container messenger">
                <div class="row">
                    <div class="col-3 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-2 border border-right-0 border-left-0 rounded-left conversations-wrapper  overflow-hidden border-top ">
                        <div class="d-flex justify-content-center justify-content-md-between pt-3 pr-1 pb-2">
                            <h5 class="d-none d-md-block text-truncate pl-3 pl-md-0 text-bold {{(Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? '' : 'text-dark-r') : (Cookie::get('app_theme') == 'dark' ? '' : 'text-dark-r'))}}">{{__('Contacts')}}</h5>
                            <span data-toggle="tooltip" title="" class="pointer-cursor"
                                  @if(!count($availableContacts))
                                    data-original-title="{{trans_choice('Before sending a new message, please subscribe to a creator a follow a free profile.',['user' => 0])}}"
                                  @else
                                    data-original-title="{{trans_choice('Send a new message',['user' => 0])}}"
                                  @endif
                            >
                                <a title="" class="pointer-cursor new-conversation-toggle" data-original-title="{{trans_choice('Send a new message',['user' => 0])}}">  <div class="mt-0 h5">@include('elements.icon',['icon'=>'create-outline','variant'=>'medium']) </div> </a>
                            </span>
                        </div>
                        <div class="conversations-list">
                            @if($lastContactID == false)
                                <div class="d-flex mt-3 mt-md-2 pl-3 pl-md-0 mb-3 pl-md-0"><span>{{__('Click the text bubble to send a new message.')}}</span></div>
                            @else
                                @include('elements.preloading.messenger-contact-box', ['limit'=>3])
                            @endif
                        </div>
                    </div>
                    <div class="col-9 col-xl-9 col-lg-9 col-md-9 col-sm-9 col-xs-10 border conversation-wrapper rounded-right p-0 d-flex flex-column ">
                        @include('elements.message-alert')
                        @include('elements.messenger.messenger-conversation-header')
                        @include('elements.messenger.messenger-new-conversation-header')
                        @include('elements.preloading.messenger-conversation-header-box')
                        @include('elements.preloading.messenger-conversation-box')
                        <div class="conversation-content pt-4 pb-1 px-3 flex-fill">
                        </div>
                        <div class="dropzone-previews dropzone w-100 ppl-0 pr-0 pt-1 pb-1"></div>
                        <div class="conversation-writeup pt-1 pb-1 d-flex align-items-center mb-1 {{!$lastContactID ? 'hidden' : ''}}">
                            <div class="messenger-buttons-wrapper d-flex pl-2">
                                <button class="btn btn-outline-primary btn-rounded-icon messenger-button attach-file mx-2 file-upload-button to-tooltip" data-placement="top" title="{{__('Attach file')}}">
                                    <div class="d-flex justify-content-center align-items-center">
                                        @include('elements.icon',['icon'=>'document','variant'=>''])
                                    </div>
                                </button>
                            </div>
                            <form class="message-form w-100">
                                <div class="input-group messageBoxInput-wrapper">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="receiverID" id="receiverID" value="">
                                    <textarea name="message" class="form-control messageBoxInput dropzone" placeholder="{{__('Write a message..')}}" onkeyup="messenger.textAreaAdjust(this)"></textarea>
                                    <div class="input-group-append z-index-3 d-flex align-items-center justify-content-center">
                                        <span class="h-pill h-pill-primary rounded mr-3 trigger" data-toggle="tooltip" data-placement="top" title="Like" >😊</span>
                                    </div>
                                </div>
                            </form>
                            <div class="messenger-buttons-wrapper d-flex">
                                @if(GenericHelper::creatorCanEarnMoney(Auth::user()))
                                    <button class="btn btn-outline-primary btn-rounded-icon messenger-button mx-2 to-tooltip" data-placement="top" title="{{__('Message price')}}" onClick="messenger.showSetPriceDialog()">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <span class="message-price-lock">@include('elements.icon',['icon'=>'lock-open','variant'=>''])</span>
                                            <span class="message-price-close d-none">@include('elements.icon',['icon'=>'lock-closed','variant'=>''])</span>
                                        </div>
                                    </button>
                                @endif
                                <button class="btn btn-outline-primary btn-rounded-icon messenger-button send-message mr-2 to-tooltip" onClick="messenger.sendMessage()" data-placement="top" title="{{__('Send message')}}">
                                    <div class="d-flex justify-content-center align-items-center">
                                        @include('elements.icon',['icon'=>'paper-plane','variant'=>''])
                                    </div>
                                </button>
                            </div>                            
                        </div>
                        <div class="option-buttons-wrapper">
                        <button class="btn-option" data-placement="top" title="" onClick=""data-toggle="modal"
                           data-target="#message-media-dialog">                                                                
                                <svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512.2 512.2" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path d="M495.1,38.4H85.5c-9.4,0-17.1,7.6-17.1,17.1v17.1H51.3c-9.4,0-17.1,7.6-17.1,17.1v17.1H17.1c-9.4,0-17.1,7.6-17.1,17.1 v332.8c0,9.4,7.6,17.1,17.1,17.1h409.6c9.4,0,17.1-7.6,17.1-17.1v-17.1h17.1c9.4,0,17.1-7.6,17.1-17.1v-17.1h17.1 c9.4,0,17.1-7.6,17.1-17.1V55.5C512.2,46,504.6,38.4,495.1,38.4z M426.8,314.4l-44.7-51.2c-3.4-3.9-9.4-3.9-12.9,0l-54,61.8 L168,194.2c-3.2-2.9-8.1-2.9-11.3,0L17.3,318.1V132.3c0-4.7,3.8-8.5,8.5-8.5h392.5c4.7,0,8.5,3.8,8.5,8.5V314.4z M452.5,422.4 H444V123.7c0-9.4-7.6-17.1-17.1-17.1H51.4v-8.5c0-4.7,3.8-8.5,8.5-8.5h392.5c4.7,0,8.5,3.8,8.5,8.5l0.1,315.8 C461,418.6,457.2,422.4,452.5,422.4z M486.6,388.2h-8.5V89.6c0-9.4-7.6-17.1-17.1-17.1H85.5V64c0-4.7,3.8-8.5,8.5-8.5h392.5 c4.7,0,8.5,3.8,8.5,8.5v315.7h0.1C495.1,384.4,491.3,388.2,486.6,388.2z"></path> <path d="M307.4,174.9c-18.8,0-34.1,15.3-34.1,34.1c0,18.8,15.3,34.1,34.1,34.1c18.8,0,34.1-15.3,34.1-34.1 C341.5,190.2,326.2,174.9,307.4,174.9z"></path> </g> </g> </g> </g></svg> 
                                Media
                            </button>                           
                            <a class="btn-option"
                           data-toggle="modal"
                           data-target="#checkout-center"
                           data-type="chat-tip"
                           data-first-name="{{Auth::user()->first_name}}"
                           data-last-name="{{Auth::user()->last_name}}"
                           data-billing-address="{{Auth::user()->billing_address}}"
                           data-country="{{Auth::user()->country}}"
                           data-city="{{Auth::user()->city}}"
                           data-state="{{Auth::user()->state}}"
                           data-postcode="{{Auth::user()->postcode}}"
                           data-available-credit="{{Auth::user()->wallet->total}}"> 
                            <svg fill="#ffffff" class="ionicon" viewBox="0 0 235.517 235.517" xml:space="preserve" fill="#ffffff" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path style="fill:#ffffff;" d="M118.1,235.517c7.898,0,14.31-6.032,14.31-13.483c0-7.441,0-13.473,0-13.473 c39.069-3.579,64.932-24.215,64.932-57.785v-0.549c0-34.119-22.012-49.8-65.758-59.977V58.334c6.298,1.539,12.82,3.72,19.194,6.549 c10.258,4.547,22.724,1.697,28.952-8.485c6.233-10.176,2.866-24.47-8.681-29.654c-11.498-5.156-24.117-8.708-38.095-10.236V8.251 c0-4.552-6.402-8.251-14.305-8.251c-7.903,0-14.31,3.514-14.31,7.832c0,4.335,0,7.843,0,7.843 c-42.104,3.03-65.764,25.591-65.764,58.057v0.555c0,34.114,22.561,49.256,66.862,59.427v33.021 c-10.628-1.713-21.033-5.243-31.623-10.65c-11.281-5.755-25.101-3.72-31.938,6.385c-6.842,10.1-4.079,24.449,7.294,30.029 c16.709,8.208,35.593,13.57,54.614,15.518v13.755C103.79,229.36,110.197,235.517,118.1,235.517z M131.301,138.12 c14.316,4.123,18.438,8.257,18.438,15.681v0.555c0,7.979-5.776,12.651-18.438,14.033V138.12z M86.999,70.153v-0.549 c0-7.152,5.232-12.657,18.71-13.755v29.719C90.856,81.439,86.999,77.305,86.999,70.153z"></path> </g> </g></svg>{{__('Tip')}}
                           </a>
                                                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('elements.standard-dialog',[
    'dialogName' => 'message-delete-dialog',
    'title' => __('Delete message'),
    'content' => __('Are you sure you want to delete this message?'),
    'actionLabel' => __('Delete'),
    'actionFunction' => 'messenger.deleteMessage();',
])
@stop
