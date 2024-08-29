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

        return [

            'sliders' => [
                'https://drive.google.com/file/d/17jMj4PYxnUgEa37VTw513F61Tk3WTi8a/view?usp=drive_link',
                'https://drive.google.com/file/d/1xe9lnx6RfmSpQSp_r9tSOWwV1RNmMBxY/view?usp=drive_link',
                'https://drive.google.com/file/d/196b5oHxzd5YSpldGMgzbviAeaZhJ5PB1/view?usp=drive_link',
                'https://drive.google.com/file/d/1cKLITs8-hXEqNqwWE_8BUpO1gXKJryRL/view?usp=drive_link',
                'https://drive.google.com/file/d/1R3qBwhzOU479zhtMiPxtx8sPUp4iqoMe/view?usp=drive_link',
                'https://drive.google.com/file/d/16XtNpeqCSoiPVZ4KhTRb0rq72tYosN3h/view?usp=drive_link',
                'https://drive.google.com/file/d/1Ob-RctxqUb6nmoBNl53V-vY6uSDGfY-W/view?usp=drive_link',
                'https://drive.google.com/file/d/1j0b9Hih3ozJgipUpJuAGjlENkuqndo2N/view?usp=drive_link',
                'https://drive.google.com/file/d/1C3EWAhlUIjKurP91K6fCLz5MnEFpet5c/view?usp=drive_link',
            ],

            'welcome' => [
                'https://drive.google.com/file/d/1ES6PROkjg09AnQdO2hn033mzg48dJT8S/view?usp=drive_link',
            ],
            'amenities' => [
                'https://drive.google.com/file/d/196b5oHxzd5YSpldGMgzbviAeaZhJ5PB1/view?usp=drive_link',
            ],
            'gallery' => [
                'https://drive.google.com/file/d/1Y1eaGKkZDXWkHORUQ9ID7OXAQOTTe4C_/view?usp=drive_link',
                'https://drive.google.com/file/d/1HuJi5if8Dhc7sahLf7KR5s6SFOJNpmh3/view?usp=drive_link',
                'https://drive.google.com/file/d/1prjVdTN-2iQ0VqXk974aeV9pChj56zRr/view?usp=drive_link',
                'https://drive.google.com/file/d/1v-7R-SfQsAzLb0zPzvfn147ViMVp-liJ/view?usp=drive_link',
                'https://drive.google.com/file/d/1VVLjDieMwBTHJBfcDb6lv7EOh1dHCnGW/view?usp=drive_link',
                'https://drive.google.com/file/d/1ZIlkG4pBMD8FycEtq0XLZ1jIllXA71qA/view?usp=drive_link',
                'https://drive.google.com/file/d/1EUI6dfkxfcyvdbKL_y0aZfT61sGXk6r7/view?usp=drive_link',
                'https://drive.google.com/file/d/1xe9lnx6RfmSpQSp_r9tSOWwV1RNmMBxY/view?usp=drive_link',
                'https://drive.google.com/file/d/19r4ddA9EBAlq7g37zN64N3Voz1tuglIm/view?usp=drive_link',
                'https://drive.google.com/file/d/1iVvVYIaeYqu8heqyUgSB1wkEWHettHEv/view?usp=drive_link',
            ]

        ];
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
                    'brands' => $brands
                ]
            );
        } else {
            if (auth()->check()  && auth()->user()->isAdmin()) {
                return view('index', compact(
                    'sliders',
                    'banners',
                    'posts',
                    'brands'

                ));
            }
            return view('underconstruction.index');
        }
    }
}
