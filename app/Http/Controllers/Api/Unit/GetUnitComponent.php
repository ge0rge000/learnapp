<?php

namespace App\Http\Controllers\Api\Unit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Unit;
use Auth;

class GetUnitComponent extends Controller
{
    public function getcategory(){


        if(Auth::check()){

            $units=Unit::where("year_type",Auth::user()->year_type)->get();

            return response(
                [ 'message'=>"units are get",
                 'status'=> true,
                 'data'=> $units]
            ,200);

        }else{
            return response(401);
        }
      }
}

