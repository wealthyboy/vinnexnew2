<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Live;
use App\Models\Location;
use App\Models\Information;
use App\Models\Property;

use App\Models\Currency;
use App\Models\Banner;

use App\Models\SystemSetting;
use App\Http\Helper;
use App\Models\Apartment;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class HomeController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {


        $site_status = Live::first();
        $banners =  Banner::banners()->get();



        if (!$site_status->make_live) {
            return view('index', compact(
                'banners',

            ));
        } else {
            //Show site if admin is logged in
            if (auth()->check()  && auth()->user()->isAdmin()) {
                return view('index', compact('banners'));
            }
            return view('underconstruction.index');
        }
    }



    public  static function generateThumbnailUrl($originalUrl)
    {
        // Extract the ID from the original URL using regular expressions
        preg_match('/\/file\/d\/(.+?)\//', $originalUrl, $matches);
        $id = $matches[1];

        // Construct the thumbnail URL
        $thumbnailUrl = "https://drive.google.com/thumbnail?id={$id}&sz=w2000";

        return $thumbnailUrl;
    }

    public  function images()
    {

      
    }






    public function home(Request $request)
    {
        $site_status = Live::first();
        $posts = Information::orderBy('created_at', 'DESC')->where('blog', true)->take(3)->get();
        $banners = Banner::where('type', 'banner')->orderBy('sort_order', 'asc')->get();
        $sliders = Banner::where('type', 'slider')->orderBy('sort_order', 'asc')->get();
        $date  = explode("to", $request->check_in_checkout);
        $nights = '1 night';
        $images = $this->images();
        $generator = new self;
        $page_title = "Ship bunkering services in nigeria";
        $page_meta_description = "We provide bunkers and other marine-related services to all types of ships, including dry/wet cargo import and export ships, as well as any other seafaring vessel, in a safe, efficient, and responsible manner in line with the regulations promoting sustainable development in the industry.";

        $brands = [
            "/images/client-vinnex/cropped-dms_logo-300x96.png" => 'daddo maritime',
            "/images/client-vinnex/aaranologo-dark2-removebg-preview-1.png" => "Aa rono",
            "/images/client-vinnex/gava.png" => "Gava",
            "/images/client-vinnex/logo-seatransport.png" => "sea transport",
            "/images/client-vinnex/logo.png" => "",
            "/images/client-vinnex/matrix-logo1.png.crdownload" => "matrix",
            "/images/client-vinnex/MGMLogofinalCMYK-1.png" => "MGM",
            "/images/client-vinnex/Monjasa_POS_logo_RGB_2020_Primary.svg" => "mONJASA",
            "/images/client-vinnex/OrionLogo.svg" => "OrionLogo",
            "/images/client-vinnex/signflu.jpeg" => "signflu",
            "/images/client-vinnex/tmo.jpeg" => "TMO",
        ];

        if (!optional($site_status)->make_live) {
            return view(
                'index',
                [
                    'sliders' => $sliders,
                    'banners'  => $banners,
                    'posts'  => $posts,
                    'brands' => $brands,
                    'page_title' => $page_title,
                    'page_meta_description' => $page_meta_description,

                ]
            );
        } else {
            if (auth()->check()  && auth()->user()->isAdmin()) {
                return view('index', compact(
                    'sliders',
                    'banners',
                    'posts',
                    'brands',
                    'page_title',
                    'page_meta_description',

                ));
            }
            return view('underconstruction.index');
        }
    }
}
