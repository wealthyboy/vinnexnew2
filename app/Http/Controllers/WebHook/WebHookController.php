<?php

namespace App\Http\Controllers\WebHook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\GuestUser;
use App\Models\Currency;
use App\Models\Reservation;
use App\Models\UserReservation;

use Carbon\Carbon;

use App\Models\Apartment;
use App\Models\Voucher;
use App\Mail\ReservationReceipt;
use App\Models\SystemSetting;
use App\Models\BookingDetail;
use App\Models\Extra;
use App\Models\ApartmentAttribute;
use App\Models\Attribute;
use App\Models\AttributeProperty;
use Illuminate\Support\Facades\Mail;

class WebHookController extends Controller
{

    public  $settings;

    public function __construct()
    {
        $this->settings =  SystemSetting::first();
    }


    public function payment(Request $request)
    {

        Log::info($request->all());

        try {


            $apartment = isset($bookings[0]) && !empty($bookings[0]) ? Apartment::find($bookings[0]->apartment_id) : null;
            $input = $request->all();
            $input = $input['data']['metadata']['custom_fields'][0]['booking'];
            $user_reservation = new UserReservation;
            $guest = new GuestUser;
            $guest->name = $input['first_name'];
            $guest->last_name = $input['last_name'];
            $guest->email = $input['email'];
            $guest->phone_number = $input['phone_number'];
            $guest->save();
            $bookings = BookingDetail::find($input['booking_ids']);
            $user_reservation->user_id = optional($request->user())->id;
            $user_reservation->guest_user_id = $guest->id;
            $user_reservation->currency = $input['currency'] === 'NGN' ? '₦' : '$';
            $user_reservation->invoice = "INV-" . date('Y') . "-" . rand(10000, time());
            $user_reservation->payment_type = 'online';
            $user_reservation->property_id = $input['property_id'];
            $user_reservation->coupon = $input['coupon'];
            $user_reservation->total = $input['total'];
            $user_reservation->original_amount = $input['original_amount'];
            $user_reservation->coming_from = 'payment';
            // $user_reservation->checkout = optional($booking)->checkout;
            $user_reservation->ip = $request->ip();
            $user_reservation->save();
            $e_services = [];
            $services = $input['services'];
            $e_services = [];
            $aq = [];
            $services = $input['services'];
            $property_extras = $input['property_services'];

            if (!empty($services)) {
                foreach ($services as $key => $room_serices) {
                    foreach ($room_serices as $key => $room_serice) {
                        foreach ($room_serice as $attribute_id => $qty) {
                            $aq[$attribute_id] = $qty;
                            $e_services[$key] = $aq;
                        }
                    }
                }
            }

            $attr = Attribute::find(optional($apartment)->apartment_id);


            foreach ($bookings as $booking) {
                $reservation = new Reservation;
                $reservation->quantity = $booking->quantity;
                $reservation->apartment_id = $booking->apartment_id;
                $reservation->price = $booking->price;
                $reservation->sale_price = $booking->sale_price;
                $reservation->user_reservation_id = $user_reservation->id;
                $reservation->property_id = $booking->property_id;
                $reservation->checkin = $booking->checkin;
                $reservation->checkout = $booking->checkout;
                $reservation->save();

                if (!empty($e_services)) {
                    foreach ($e_services as $key => $attributes) {
                        foreach ($attributes as $attribute_id => $qty) {
                            $extras = new Extra;
                            if ($booking->apartment_id == $key) {
                                $attribute = ApartmentAttribute::where('attribute_id', $attribute_id)->first();
                                $extras->apartment_id = $key;
                                $extras->property_id = $request->property_id;
                                $extras->quantity = $qty;
                                $extras->user_id = optional($request->user())->id;
                                $extras->reservation_id = $reservation->id;
                                $extras->price = $attribute->converted_price;
                                $extras->guest_user_id = $guest->id;
                                $extras->attribute_id = $attribute_id;
                                $extras->save();
                            }
                        }
                    }
                }

                $booking->delete();
            }



            foreach ($property_extras as $attribute_id) {
                $attribute = ApartmentAttribute::where('attribute_id', $attribute_id)->first();
                $attr = AttributeProperty::where('attribute_id', $attribute_id)->first();
                $extras = new Extra;
                $extras->property_id = $request->property_id;
                $extras->user_id = optional($request->user())->id;
                $extras->guest_user_id = $guest->id;
                $extras->attribute_id = $attribute_id;
                $extras->user_reservation_id = $user_reservation->id;
                $extras->price = optional($attr)->price;
                $extras->save();
            }

            $admin_emails = explode(',', $this->settings->alert_email);
            try {
                //$when = now()->addMinutes(5); 
                Mail::to($guest->email)
                    ->bcc('avenuemontaigneconcierge@gmail.com')
                    ->bcc('info@avenuemontaigne.ng')
                    ->send(new ReservationReceipt($user_reservation, $this->settings));

                $user_reservation->agent = 1;
                $user_reservation->apname = optional($apartment)->name;

                if (null !== $attr && $attr->apartment_owner) {
                    Mail::to($attr->apartment_owner)->send(new ReservationReceipt($user_reservation, $this->settings));
                }
            } catch (\Throwable $th) {
                //dd($th);
                Log::error("Mail error :" . $th);
            }

            //delete cart
            if ($request->coupon) {
                $code = trim($request->coupon);
                $coupon =  Voucher::where('code', $request->coupon)->first();
                if (null !== $coupon && $coupon->type == 'specific') {
                    $coupon->update(['valid' => false]);
                }
            }

            return $request->all();
        } catch (\Throwable $th) {
            Log::error($th);
        }
    }

    public function gitHub()
    {
        $output = shell_exec('sh /home/forge/avenuemontaigne.ng/deploy.sh');
        echo "Successfull";
        Log::info($output);
    }
}
