<?php

namespace App\Http\Controllers\Api\Slider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
class SliderController extends Controller
{
    public function slider(){

        $sliders=Slider::all();
        return response(
            [ 'message'=>"sliders are get",
             'status'=> true,
             'data'=> $sliders]
        ,200);
    }
}
