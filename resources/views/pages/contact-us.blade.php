@extends('layouts.app')
@section('content')


<header>
    <div class="page-header min-vh-75 h-28 position-relative" style="background-image: url(/images/banners/vinnex_Services_ship_bunkering-3.jpg); background-position: top;" loading="lazy">
        <span class="position-absolute top-0 start-0 w-100 h-100  bg-black opacity-50"></span>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-white text-center">
                    <h1 class="title text-white">Contact Us</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="">
    <nav class="breadcrumbs" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item">Contact us</li>
        </ol>
    </nav>
</div>

<div class="" style="background-color: #fff;">
    <div class="container" itemscope itemtype="https://schema.org/Service">
        <div class="row">
            <div class="col-md-8 mb-5">
                <div class="widget contact-info">
                    <div class="sidebar-title">
                        <h3>Contact information</h3>
                    </div>
                    <ul class="info">
                        <li><strong>Address</strong> 8 Payne Crescent Apapa, Lagos,Nigeria. Nigeria</li>
                        <li><strong>Email</strong> <a href="#">info@vinnexservices.com / bunkers@vinnexservices.com</a></li>
                        <li><strong>Phone</strong> +234 8178765125,+234 906 892 5416</li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection
@section('page-scripts')
@stop
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

      jQuery(function() {

      });
@stop