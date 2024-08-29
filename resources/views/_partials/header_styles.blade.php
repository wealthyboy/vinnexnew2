<head>
   <meta charset="utf-8" />
   <title>{{ isset( $page_title) ?  $page_title .' |  '.config('app.name') :  optional($system_settings)->meta_title  }}</title>
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <meta name="description" content="{{ isset($page_meta_description) ? $page_meta_description : optional($system_settings)->meta_description }}">
   <meta name="keywords" content="{{ isset(optional($system_settings)->meta_tag_keywords) ? optional($system_settings)->meta_tag_keywords : 'cleanse,detox,flattummy,flattummy tea ng,slimming tea' }}" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="canonical" href="{{ Config('app.url') }}">

   <link rel="icon" type="image/x-icon" href="/img/favicon-32x32.png">
   <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
   <link rel="icon" href="/img/favicon.ico" type="image/x-icon">
   <link rel="apple-touch-icon" href="/img/apple-touch-icon.png">

   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Nanum+Myeongjo&display=swap" rel="stylesheet">
   <link href="/css/services_style.css?version={{ str_random(6) }}" rel="stylesheet">
   <link href="/css/banner.css?version={{ str_random(6) }}" rel="stylesheet">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

   @yield('page-css')
   <meta property="og:site_name" content="vinnexservices.com">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <meta property="og:url" content="https://vinnexservices.com/">
   <meta property="og:title" content="vinnexservices">
   <meta property="og:type" content="website">
   <meta property="og:description" content="{{ isset($page_meta_description) ? $page_meta_description : optional($system_settings)->meta_description }}">
   <meta property="og:image:alt" content="">
   <meta name="twitter:site" content="@vinnexservices">
   <meta name="twitter:card" content="summary_large_image">
   <meta name="twitter:title" content="{{ isset($page_meta_description) ? $page_meta_description : optional($system_settings)->meta_description }}">
   <meta name="twitter:description" content="{{ isset($page_meta_description) ? $page_meta_description : optional($system_settings)->meta_description }}">
   <script src="/js/popper.min.js"></script>


</head>