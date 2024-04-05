{{-- Global JS Assets --}}
{!!
    Minify::javascript(
        array_merge([
        '/libs/jquery/dist/jquery.min.js',
        '/libs/popper.js/dist/umd/popper.min.js',
        '/libs/bootstrap/dist/js/bootstrap.min.js',
        '/js/plugins/toasts.js',
        '/libs/cookieconsent/build/cookieconsent.min.js',
        '/libs/xss/dist/xss.min.js',
        '/js/app.js',
    ],
    (isset($additionalJs) ? $additionalJs : [])
    ))->withFullUrl()
!!}

{{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
{{-- WARNING: Respond.js doesn't work if you view the page via file:// --}}
{{--[if lt IE 9]>
{!! Minify::javascript(array('//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '//oss.maxcdn.com/respond/1.4.2/respond.min.js')) !!}
<![endif]--}}

{{-- Page specific JS --}}
@yield('scripts')
@yield('captcha')
<script type="module" src="{{asset('/libs/ionicons/dist/ionicons/ionicons.esm.js')}}"></script>
<script nomodule src="{{asset('/libs/ionicons/dist/ionicons/ionicons.js')}}"></script>
<script src="/js/noty/lib/noty.js" type="text/javascript"></script>
<script src="/libs/mdb-ui-kit/js/mdb.umd.min.js" type="text/javascript"></script>
<script src="//cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js" type="text/javascript"></script>
<script src="//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="/libs/lightbox/dist/ekko-lightbox.js" type="text/javascript"></script>

<script>
    let titleEditor;
    let descEditor;

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });

    $(function () {
        $('.select2-form-js-field').select2({
            width: 'resolve'
        });

        ClassicEditor
            .create (document.querySelector('.ckeditor-input-title'))
            .then( editor => {
                titleEditor = editor;
                
                editor.model.document.on( 'change:data', () => {
                    editorData = editor.getData();
                } );
            } )
            .catch (error => {
                console.error (error);
            });
        ClassicEditor
            .create (document.querySelector('.ckeditor-input-description'))
            .then( editor => {
                descEditor = editor;

                editor.model.document.on( 'change:data', () => {
                    editorData = editor.getData();
                } );
            } )
            .catch (error => {
                console.error (error);
            });


        //const element = document.querySelector('.accordion-button');
        //const instance = new Collapse(element);
    });
</script>
@yield('custom_js')

@if(getSetting('custom-code-ads.custom_js'))
    {!! getSetting('custom-code-ads.custom_js') !!}
@endif

@include('elements.translations')
