<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta http-equiv="Content-Language" content="en" />

<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="194x194" href="/favicon-194x194.png">
<link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="/mstile-144x144.png">
<meta name="theme-color" content="#ffffff">

@yield('meta')

<link rel="canonical" href="@yield('canonical', request()->url())" />
<title>@yield('page_title') - {{ env('APP_NAME') }}</title>

<!-- Search Engine -->
<meta name="description" content="Find and join laravel developers around the world!">
<meta name="image" content="https://laramap.com/static/LOGO_SQUARE_TRANS@2x-1.png">
<!-- Schema.org for Google -->
<meta itemprop="name" content="Laramap.com">
<meta itemprop="description" content="Find and join laravel developers around the world!">
<meta itemprop="image" content="https://laramap.com/static/LOGO_SQUARE_TRANS@2x-1.png">
<!-- Twitter -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="Laramap.com">
<meta name="twitter:description" content="Find and join laravel developers around the world!">
<meta name="twitter:site" content="@laramapcom">
<meta name="twitter:creator" content="@fwartner">
<meta name="twitter:image:src" content="https://laramap.com/static/og_logo_twitter.png">
<!-- Open Graph general (Facebook, Pinterest & Google+) -->
<meta name="og:title" content="Laramap.com">
<meta name="og:description" content="Find and join laravel developers around the world!">
<meta name="og:image" content="https://laramap.com/static/og_logo.png">
<meta name="og:url" content="Laramap.com">
<meta name="og:site_name" content="Laramap.com">
<meta name="og:locale" content="en_US">
<meta name="og:type" content="website">
