@inject('helper', 'App\Http\Helper')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link href="https://vjs.zencdn.net/8.10.0/video-js.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />


@include('_partials.header_styles')


<script type="application/ld+json" class="yoast-schema-graph">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "CollectionPage",
      "@id": "https://vinnexservices.com/",
      "url": "https://vinnexservices.com/",
      "name": "Vinnex Services - Oil & Shipping Solutions",
      "isPartOf": {
        "@id": "https://vinnexservices.com/#website"
      },
      "about": {
        "@id": "https://vinnexservices.com/#organization"
      },
      "description": "Vinnex Services specializes in trading and supplying marine fuels, leveraging extensive relationships across the oil and shipping sectors.",
      "breadcrumb": {
        "@id": "https://vinnexservices.com/#breadcrumb"
      },
      "inLanguage": "en-US"
    },
    {
      "@type": "BreadcrumbList",
      "@id": "https://vinnexservices.com/#breadcrumb",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "https://vinnexservices.com/"
        }
      ]
    },
    {
      "@type": "WebSite",
      "@id": "https://vinnexservices.com/#website",
      "url": "https://vinnexservices.com/",
      "name": "Vinnex Services",
      "description": "We are Vinnex Services, your trusted partner in every port.",
      "publisher": {
        "@id": "https://vinnexservices.com/#organization"
      },
      "potentialAction": [
        {
          "@type": "SearchAction",
          "target": {
            "@type": "EntryPoint",
            "urlTemplate": "https://vinnexservices.com/?s={search_term_string}"
          },
          "query-input": "required name=search_term_string"
        }
      ],
      "inLanguage": "en-US"
    },
    {
      "@type": "Organization",
      "@id": "https://vinnexservices.com/#organization",
      "name": "Vinnex Services",
      "url": "https://vinnexservices.com/",
      "logo": {
        "@type": "ImageObject",
        "inLanguage": "en-US",
        "@id": "https://vinnexservices.com/#/schema/logo/image/",
        "url": "https://www.vinnexservices.com/images/logo/vinnexservices_logo-ship-bukering.png",  // Update with the actual logo URL
        "contentUrl": "https://www.vinnexservices.com/images/logo/vinnexservices_logo-ship-bukering.png",  // Update with the actual logo URL
        "width": 2105,
        "height": 1488,
        "caption": "Vinnex Services"
      },
      "image": {
        "@id": "https://vinnexservices.com/#/schema/logo/image/"
      },
      "sameAs": [
        "https://www.instagram.com/vinnexservices",
        "https://www.linkedin.com/company/vinnexservices",
        "https://www.youtube.com/channel/your_channel_id"  // Update with the actual YouTube channel
      ]
    }
  ]
}
</script>

<body>
   <div id="app" class="app ">
      <nav class="navbar   mt-5 px-5 navbar-fixed-top navbar-expand-lg  navbar-transparent navbar-absolute" color-on-scroll="100" id="sectionsNav">
         @include('_partials.header', ['show_logo' => true, 'show_book' => true])
      </nav>
      <div id="content" class="main  index-page bg-grey">
         @yield('content')
      </div>
      @include('_partials.footer')
      </footer>
   </div>


   <script src="/js/services_js.js?version={{ str_random(6) }}"></script>




   @yield('page-scripts')
   <script type="text/javascript">
      @yield('inline-scripts')
      jQuery(function() {

      });
   </script>

</body>

</html>