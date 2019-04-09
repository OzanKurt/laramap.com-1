<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('_includes.meta')

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-TXfwrfuHVznxCssTxWoPZjhcss/hp38gEOH8UPZG/JcXonvBQ6SlsIF49wUzsGno" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.47.0/mapbox-gl.css' rel='stylesheet' />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/instantsearch.js@2.9.0/dist/instantsearch.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @stack('styles')

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    @stack('header_scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://wartner.io/js/made-by-widget.js" defer></script>

    <script>
        window.Laramap = <?php echo json_encode(array_merge(
            \App\Configuration\Laramap::scriptVariables(), []
        )); ?>;
    </script>
</head>

<body class="" cz-shortcut-listen="true">

<div id="app">
    @if(request()->is('login') OR request()->is('register') OR request()->is('password/*') OR request()->is('auth/social'))
        @yield('content')
    @else
        @include('_includes.navigation')
        <div id="wrapper">
            @yield('content')
            <made-by></made-by>
        </div>
        @include('_includes.footer')
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="{{ mix('js/app.js') }}"></script>
<script type="text/javascript">
    var _paq = _paq || [];
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
        var u="https://stats.wartner.io/";
        _paq.push(['setTrackerUrl', u+'piwik.php']);
        _paq.push(['setSiteId', '2']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
    })();
</script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-63437005-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-63437005-1');
</script>

<script>
    (function(d, h, m){
        var js, fjs = d.getElementsByTagName(h)[0];
        if (d.getElementById(m)){return;}
        js = d.createElement(h); js.id = m;
        js.onload = function(){
            window.makerWidgetComInit({
            position: "left",          
            widget: "0c5dyvtcey04wsg0-lf12em9zk0pl62nr-gpv6dzqvdpkqazof"                
        })};
        js.src = "https://makerwidget.com/js/embed.js";
        fjs.parentNode.insertBefore(js, fjs)
    }(document, "script", "dhm"))
</script>
@stack('footer_scripts')

</body>
</html>
