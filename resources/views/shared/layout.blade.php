<!doctype html>
<html class="no-js" lang="" class="has-navbar-fixed-bottom-desktop">

<head>
    <meta charset="utf-8">
    <title>Punk Goes Acoustic, Vol. 3</title>
    <meta name="description" content="The official website of the Punk Goes Series. New Album ‘Punk Goes Acoustic, Vol. 3’ Available September 13.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="{{asset('site.webmanifest')}}">

    <link rel="stylesheet" href="https://use.typekit.net/dxe7xuy.css">
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}" />
    @if(isset($add_summernote))
        <link rel="stylesheet" href="{{asset('css/summernote-lite.css')}}" />
    @endif
    @if(isset($enable_spectrum))
        <link rel="stylesheet" href="{{asset('css/spectrum.css')}}" />
    @endif
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />

    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('manifest.json')}}">
    <meta name="msapplication-TileColor" content="#2358B8">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#2358B8">

    @if(isset($share_title))
    <meta property="og:title" content="{{$share_title}}">
    @else
    <meta property="og:title" content="Punk Goes Acoustic">
    @endif
    <meta property="og:description" content="A place for Fearless friends.">
    @if(isset($share_image))
    <meta property="og:image" content="{{ asset('uploads/albums/'.$share_image) }}">
    @else
    <meta property="og:image" content="{{ asset('img/fb_share.png') }}">
    @endif
    <meta property="og:url" content="{{Request::fullUrl()}}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="{{Request::fullUrl()}}">
    <meta name="twitter:creator" content="@punk_goes">
    @if(isset($share_title))
    <meta name="twitter:title" content="{{ $share_title }}">
    @else
    <meta name="twitter:title" content="Punk Goes Acoustic">
    @endif
    <meta name="twitter:description" content="A place for Fearless friends.">
    @if(isset($share_image))
    <meta name="twitter:image" content="{{ asset('uploads/albums/'.$share_image) }}">
    @else
    <meta name="twitter:image" content="{{ asset('img/twitter_share.png') }}">
    @endif

    <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
        /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
        We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
        @font-face {
            font-family: 'HermanoAlto Round';
            src: url('{{asset('webfonts/HermanoAltoRound.eot')}}');
            src: url('{{asset('webfonts/HermanoAltoRound.eot?#iefix')}}') format('embedded-opentype'),
            url('{{asset('webfonts/HermanoAltoRound.woff2')}}') format('woff2'),
            url('{{asset('webfonts/HermanoAltoRound.woff')}}') format('woff'),
            url('{{asset('webfonts/HermanoAltoRound.ttf')}}') format('truetype'),
            url('{{asset('webfonts/HermanoAltoRound.svg#HermanoAltoRound')}}') format('svg');
            font-weight: normal;
            font-style: normal;
        }
        .hermano {
            font-family: 'HermanoAlto Round', sans-serif;
        }
        @if(isset($use_custom_styles) && $use_custom_styles)
        body.theme-override {
            background-color: {{$custom_styles['main_bg_color']}};
            @if(isset($custom_styles['main_bg_image']))
            background-image: url('{{asset('uploads/themes/'.$custom_theme_id.'/'.$custom_styles['main_bg_image'])}}');
            background-position: {{$custom_styles['main_bg_position']}};
            @if($custom_styles['main_bg_fill'] != 'tile')
             -webkit-background-size: {{$custom_styles['main_bg_fill']}};
            background-size: {{$custom_styles['main_bg_fill']}};
            background-repeat: no-repeat;
            @endif
            @endif
        }
        body.theme-override, .theme-override strong, .theme-override .online-now, .theme-override .online-now i, .theme-override .about-me-title {
            color: {{$custom_styles['general_text_color']}} !important;
        }
        .theme-override .main-content a {
            color: {{$custom_styles['general_link_color']}} !important;
        }
        .theme-override .main-content-wrapper {
            background-color: {{$custom_styles['content_bg_color']}};
        }
        .theme-override #profile #header {
            position: relative;
            background: {{$custom_styles['header_bg']}};
            background-image: none;
            z-index: 0;
        }
        .theme-override #profile #header:after {
            content: '';
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: {{$custom_styles['header_bg']}};
            background: -moz-linear-gradient(180deg, {{$custom_styles['header_bg']}} 0%, {{$custom_styles['header_scrim']}} 100%);
            background: -webkit-linear-gradient(180deg, {{$custom_styles['header_bg']}} 0%, {{$custom_styles['header_scrim']}} 100%);
            background: linear-gradient(180deg, {{$custom_styles['header_bg']}} 0%, {{$custom_styles['header_scrim']}} 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="{{$custom_styles['header_bg']}}",endColorstr="{{$custom_styles['header_scrim']}}",GradientType=1);
            z-index: -1;
            opacity: 0.3;
        }
        .theme-override #header .nav-links {
            background-image: none;
        }
        .theme-override #header .nav-links a.add-border {
            border-right: none;
        }
        .theme-override #header .nav-links a:hover {
            background: rgba(0,0,0,0.1);
        }
        .theme-override #header .nav-links a.edit-profile {
            background-image: none;
        }
        .theme-override #header .nav-links a {
            color: {{$custom_styles['header_text_color']}};
        }
        .theme-override .blue-content-block {
            border-color: {{$custom_styles['left_module_table_base_color']}}
        }
        .theme-override .blue-content-block h3 {
            background: {{$custom_styles['left_module_table_base_color']}};
            color: {{$custom_styles['left_module_header_text_color']}};
        }
        .theme-override #profile .connect-block li a .fas, .theme-override #profile .connect-block li a .fab {
            color: {{$custom_styles['left_module_icon_color']}} !important;
            background-image: none !important;
            -webkit-text-fill-color: {{$custom_styles['left_module_icon_color']}};
        }
        .theme-override #profile .details-table .th {
            background: {{$custom_styles['left_module_table_left_column_color']}};
            color: {{$custom_styles['left_module_table_left_column_text_color']}};
        }
        .theme-override #profile .details-table .td {
            background: {{$custom_styles['left_module_table_right_column_color']}};
            color: {{$custom_styles['left_module_table_right_column_text_color']}};
        }
        .theme-override .orange-content-block h3 {
            background: {{$custom_styles['right_module_table_base_color']}};
            color: {{$custom_styles['right_module_table_header_text_color']}};
        }
        @media screen and (max-width: 768px){
            .theme-override #footer {
                padding-top: 40px;
            }
        }
        @endif
    </style>

<!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '832248876927643');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=832248876927643&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '309432352842423');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=309432352842423&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->
    <!-- Global site tag (gtag.js) - Google Ads: 1013879419 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-1013879419"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-1013879419');
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-141893903-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-141893903-1');
    </script>
</head>

<body class="{{(isset($custom_styles) && !empty($custom_styles)) ? 'theme-override' : ''}}">
<script>!function(e,t,n,s,a,c,p,i,o,u){e[a]||((i=e[a]=function(){i.process?i.process.apply(i,arguments):i.queue.push(arguments)}).queue=[],i.pixelId="ac2359fd-c120-43e4-8d18-f2eddf1d81f9",i.t=1*new Date,(o=t.createElement(n)).async=1,o.src="https://found.ee/dmp/pixel.js?t="+864e5*Math.ceil(new Date/864e5),(u=t.getElementsByTagName(n)[0]).parentNode.insertBefore(o,u))}(window,document,"script",0,"foundee");foundee('', 'Y');</script>

@if($_SERVER['SERVER_NAME'] == 'test.punkgoes.com')
<div class="notification is-warning has-text-centered" style="margin-bottom: 0;">
    <button class="delete"></button>
    <i class="fas fa-exclamation-triangle"></i> <strong>This is the test site</strong> <i class="fas fa-exclamation-triangle"></i>
</div>
@endif

@yield('content')
@include('shared.footer')
@include('shared.modals')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>
    (function($) {window.fnames = new Array(); window.ftypes = new
    Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';}
    (jQuery));var $mcj = jQuery.noConflict(true);</script>
@if(isset($add_summernote))
<script src="{{ asset('js/summernote-lite.min.js') }}"></script>
@endif
@if(isset($enable_spectrum))
<script src="{{ asset('js/spectrum.min.js') }}"></script>
<script src="{{ asset('js/theme-editor.js') }}"></script>
@endif
<script src="{{ asset('js/app.js') }}"></script>
@if($_SERVER['SERVER_NAME'] == 'test.punkgoes.com')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
            $notification = $delete.parentNode;
            $delete.addEventListener('click', () => {
                $notification.parentNode.removeChild($notification);
            });
        });
    });
</script>
@endif
</body>
</html>
