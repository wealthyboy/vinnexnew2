<div class="container-fluid">

    <div class="navbar-translate d-flex justify-content-between w-100 fixed-top">
        <a href="/" class="navbar-brand">
            <div class="logo-small">
                <img src="/images/logo/vinnexservices_logo-ship-bukering.png" alt="Vinnex Services Logo" srcset="">
            </div>
        </a>

        <div class="d-flex justify-content-center align-items-center">
            @if(isset($show_book) && $show_book)
            <a href="/apartments" class="align-self-center mr-3 d-none d-lg-block font-weight-bold btn-primary bold-3 btn text-white">
                <i class="fa fa-phone"></i>
            </a>
            @endif

            <button class="navbar-toggler d-block text-white border-none" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon text-white"></span>
                <span class="navbar-toggler-icon text-white"></span>
                <span class="navbar-toggler-icon text-white"></span>
            </button>
        </div>
    </div>

    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-center w-100 mt-5" itemscope itemtype="https://schema.org/SiteNavigationElement">
            <li class="w-100 py-3 font-weight-bold" itemprop="name">
                <a href="/" title="Home" itemprop="url">Home</a>
            </li>
            <li class="w-100 font-weight-bold" itemprop="name">
                <a href="/our-services" title="Services" itemprop="url">Services</a>
            </li>
            <li class="w-100 py-3 font-weight-bold" itemprop="name">
                <a href="/about-us" title="About Us" itemprop="url">About Us</a>
            </li>
            <li class="w-100 font-weight-bold" itemprop="name">
                <a href="/board-of-directors" title="Board Of Directors" itemprop="url">Board Of Directors</a>
            </li>
            <li class="w-100 py-3 font-weight-bold" itemprop="name">
                <a href="/contact-us" title="Contact" itemprop="url">Contact</a>
            </li>
        </ul>
    </div>
</div>
@include('_partials.svg')