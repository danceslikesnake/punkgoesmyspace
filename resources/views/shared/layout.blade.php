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

<body>
<script>!function(e,t,n,s,a,c,p,i,o,u){e[a]||((i=e[a]=function(){i.process?i.process.apply(i,arguments):i.queue.push(arguments)}).queue=[],i.pixelId="ac2359fd-c120-43e4-8d18-f2eddf1d81f9",i.t=1*new Date,(o=t.createElement(n)).async=1,o.src="https://found.ee/dmp/pixel.js?t="+864e5*Math.ceil(new Date/864e5),(u=t.getElementsByTagName(n)[0]).parentNode.insertBefore(o,u))}(window,document,"script",0,"foundee");foundee('', 'Y');</script>
@yield('content')
@include('shared.footer')
@include('shared.modals')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>
    (function($) {window.fnames = new Array(); window.ftypes = new
    Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';}
    (jQuery));var $mcj = jQuery.noConflict(true);</script>
<script src="{{ asset('js/summernote-lite.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
