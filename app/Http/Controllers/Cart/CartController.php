<?php

namespace App\Http\Controllers\Cart;


use Domain\Hotel\ViewModels\HotelViewModel;
use Illuminate\Http\Request;

class CartController
{

    public function cart_form(Request $request) {

       $data =  json_decode($request->tour_data);


       if($data) {

           $hotels = [];
           $new_hotels = [];

           foreach ($data as $h)
           {
               $hotel_ids[$h->hotel] = $h->hotel;
           }

           $hotels = HotelViewModel::make()->Hotels($hotel_ids); // array c ключами из slug

       }


       foreach ($data as $k => $datum) {

           if($datum->hotel == (isset($hotels[$datum->hotel]))?(int)$hotels[$datum->hotel]['slug']: 0) {

               $data[$k]->site_hotel  = $hotels[$datum->hotel];

           } else {

               $data[$k]->site_hotel  = null;

           }


       }

     //  dd($data);

          return view('cart/cart', [
              'tour_data' => $data,
        ]);

    }

    public function cart(){

          return view('cart/cart', ['tour_data' => []]);
    }

}
