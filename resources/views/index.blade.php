@extends('layouts.app')
@section('content')

<!-- Schema Markup -->
<script type="application/ld+json">
   {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": "Vinnex Services",
      "url": "https://www.vinnexservices.com",
      "logo": "https://www.vinnexservices.com/images/logo/vinnexservices_logo-ship-bukering.png",
      "contactPoint": {
         "@type": "ContactPoint",
         "telephone": "+234 701 897 1322",
         "contactType": "Customer Service"
      }
   }
</script>


<div class="video-background">
  <!-- Video Background -->
  <video autoplay muted loop>
    <source src="/images/banners/Ocean-21528.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>

  <!-- Dark Overlay -->
  <div class="video-overlay"></div>

  <!-- Centered Text Content -->
  <div class="container text-center text-container d-flex flex-column justify-content-center align-items-center h-100">
    <h1 class="fw-bold text-white bold-4" title="Introduction to Vinnex Services">Vinnex Services</h1>
    <h1 class="fw-bold text-white bold-4" title="Vinnex Services: Your Trusted Partner">Your Partner in Every Port</h1>
    <p class="fw-bold text-white display-4 d-none d-md-block">
      At Vinnex Services, we excel in trading and supplying marine fuels, leveraging our extensive network of personal relationships across the oil and shipping industries. With us, you gain a reliable partner committed to meeting your needs at every port.
    </p>
  </div>
</div>

<!-- <div  id="banner" class="banner d-flex align-items-center justify-content-center text-center">
  <div class="container">
    <h1 class="fw-bold text-white bold-4" title="Introduction to Vinnex Services">We are Vinnex Services</h1>
    <h1 class="fw-bold text-white bold-4" title="Vinnex Services: Your Trusted Partner">Your  Partner in Every Port</h1>
    <p class="fw-bold text-white display-4 d-none d-md-block">
      At VinnexServices, we excel in trading and supplying marine fuels, leveraging our extensive network of personal relationships across the oil and shipping industries. With us, you gain a reliable partner committed to meeting your needs at every port.
    </p>
  </div>
</div> -->


<div class="container-fluid mb-2 bg-grey">
   <div class="row">
      <div id="tree" class="opacity-0 back-1">
         <div class="col-md-12">
            <section id="rbox1">
               <div class="row position-relative">
                  <div class="col-lg-7 col-md-12 rounded card-background-image"></div>
                  <div class="col-lg-5 col-md-12 welcome text-center d-flex justify-content-center align-items-center">
                     <div class="about-panel bg-right-panel bg-panel-white bg-panel p-sm-3 p-md-5">
                        <div class="primary-color">Committed to delivering exceptional maritime solutions</div>
                        <h2 class="bold-2" title="About Vinnex Services">About Us</h2>
                        <p class="mt-4 text-left text-black light-bold">
                           Vinnex Investment Services Limited (VISL) is an indigenous marine, energy & petroleum (E&P) services company incorporated and registered in June 2007 to carry out such businesses but not limited to the under listed. VISL is focused on products and services that have been structured to meet every of your company’s/shipping needs such as the...
                        </p>
                        <div class="buttons">
                           <a href="/about-us" class="btn btn-primary rounded bold-2">
                              Read More
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
   </div>
</div>


<div class="container-fluid mb-2">
   <div class="row">
      <div id="tree" title="Discover seamless maritime excellence with Vinnex, offering tailored marine services, reliable diesel bunker supply, expert supply chain management, comprehensive marine security services, quality ship store suppliers, safe ship-to-ship operations, and top-notch deck store supplies for your maritime needs...
" class="opacity-  back-2">
         <div class="col-md-12">
            <section id="leftBox">
               <div class="row position-relative">
                  <div class="col-lg-5 col-md-12 welcome text-center d-flex justify-content-center align-items-center">
                     <div class="about-panel bg-right-panel bg-panel-white bg-panel p-sm-3 p-md-5 ml-4">
                        <div class="primary-color">Discover Seamless Maritime Excellence with</div>
                        <h2 class="bold-2" title="Vinnex Services: Our Services">Our Services</h2>
                        <p class="mt-4 text-left text-black light-bold">
                           Discover seamless maritime excellence with Vinnex, offering tailored marine services, reliable diesel bunker supply, expert supply chain management, comprehensive marine security services, quality ship store suppliers, safe ship-to-ship operations, and top-notch deck store supplies for your maritime needs...
                        </p>
                        <div class="buttons">
                           <a href="/our-services" class="btn btn-primary rounded bold-2">
                              Read More
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-7 col-md-12 rounded card-background-image"></div>
               </div>
            </section>
         </div>
      </div>
   </div>
</div>

<div class="container mt-5 mb-5">
   <div class="text-center mb-4">
      <h1>Clients</h1>
      <p class="lead">We are proud to work with these great brands</p>
   </div>

   <div class="row g-0">
      @foreach($brands as $key => $brand)
      <div itemscope itemtype="https://schema.org/Brand" data-animation-name="fadeInUpShorter" class="col-6 mb-1  col-md-3   p-0 p-1  appear-animate  ">
         <a class="d-block p-0 border">
            <div class="d-flex justify-content-center align-items-center bg-white">
               <div class="d-flex justify-content-center align-items-center text-center image-category">
                  <img srcset=" {{$key}} 480w, {{$key}} 768w,  {{$key}} 1200w" sizes="(max-width: 480px) 480px, (max-width: 768px) 768px, 1200px" itemprop="image" class="image-class img-fluid" title="VInnex services Clients  {{$brand}}" src="{{ $key }}" alt="{{ $brand }} ">
               </div>
            </div>
         </a>
      </div>
      @endforeach
   </div>


</div>
<div class="container-fluid mb-2">
   <div class="row">
      <div id="box3" class="opacity-0 back-3">
         <div class="col-md-12">
            <section id="box3">
               <div class="row position-relative">
                  <div title="contact us vinnex services " class="col-lg-7 col-md-12 rounded card-background-image"></div>
                  <div class="col-lg-5 col-md-12 welcome text-center d-flex justify-content-center align-items-center">
                     <div class="about-panel bg-right-panel bg-panel-white bg-panel p-sm-3 p-md-5">
                        <div class="primary-color">Know us</div>
                        <h2 class="bold-2" title="Contact Vinnex Services">Contact Us</h2>
                        <p class="mt-4 text-left text-black light-bold">
                           We'd love to hear from you! Whether you have questions about our services, need assistance with your maritime operations, or want to discuss a custom solution, our team is here to help.
                        </p>
                        <div class="buttons">
                           <a href="/contact-us" class="btn btn-primary rounded bold-2">
                              Contact Us
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </section>\
         </div>
      </div>
   </div>
</div>

<!-- Brochure Download Section -->
<header>
   <div class="page-header min-vh-75 half-hv position-relative" style="background-color: #89CFF0 !important " loading="lazy">
      <span class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-50"></span>
      <div class="container">
         <div class="row">
            <div class="col-lg-8 mx-auto text-white text-center">
               <h1 class="text-white bold-1" title="Download Vinnex Services Brochure">DOWNLOAD OUR BROCHURE</h1>
               <!-- Teaser Text -->
               <div class="mb-3">
                  <p class="text-white lead">
                     Discover more about our services and offerings. Download our comprehensive brochure to get all the details you need.
                  </p>
               </div>
               <!-- Brochure Download Button -->
               <div class="mb-3">
                  <a href="/download-pdf" class="btn btn-primary btn-lg">
                     Download Our Brochure
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>

@endsection

@section('inline-scripts')


document.addEventListener("DOMContentLoaded", function () {
    const banner = document.getElementById('banner');
    console.log(banner)
    let zoomIn = true;

    setInterval(() => {
        if (zoomIn) {
            banner.classList.remove('zoom-out');
            banner.classList.add('zoom-in');
        } else {
            banner.classList.remove('zoom-in');
            banner.classList.add('zoom-out');
        }
        zoomIn = !zoomIn;
    }, 5000); // Change every 10 seconds
});

jQuery(function() {

  

// Add touch event listeners to centered images
$(".intro-image").on("touchstart", function(event) {
// Record the initial touch position
var startX = event.touches[0].clientX;
// Add touch move event listener
$(this).on("touchmove", function(event) {
// Calculate the distance moved
var moveX = event.touches[0].clientX - startX;
// If the distance moved is greater than a threshold, trigger carousel swipe
if (Math.abs(moveX) > 50) { // Adjust threshold as needed
if (moveX > 0) {
// Swipe right
$(".owl-carousel").trigger("prev.owl.carousel");
} else {
// Swipe left
$(".owl-carousel").trigger("next.owl.carousel");
}
// Remove touchmove event listener to prevent multiple triggers
$(this).off("touchmove");
}
});
// Add touchend event listener to clean up
$(this).on("touchend", function() {
// Remove touchmove event listener
$(this).off("touchmove");
});
});
console.log(true);
});

@stop