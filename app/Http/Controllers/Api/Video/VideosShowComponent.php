<?php

namespace App\Http\Controllers\Api\Video;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use Auth;
class VideosShowComponent extends Controller
{

  public function checkvalidate($id_unit){

    if(Auth::check()){

        if(Auth::user()->case_reverse=="0"){
            return response(
                ['message'=>'يجب عليك الشراء اولا الباقه']
            ,400);
        }else{

            $videos=Video::whereHas("units",function ($q) use($id_unit)

            {
                $q->where('unit_id' , $id_unit);

            })->get();

            return response(
                ['message'=>"video are get",
                 'status'=> true,
                 'data'=> $videos]
            ,200);


        }
    }else{
        return response(401);
    }
  }
}
