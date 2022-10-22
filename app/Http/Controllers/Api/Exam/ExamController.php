<?php

namespace App\Http\Controllers\API\Exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use Auth;
class ExamController extends Controller
{
  public function returnexams(){
    if(Auth::check()){

      $exams=Exam::where("year_type",Auth::user()->year_type)->where("show_exam","1")->get();

      return response(
        [ 'message'=>"exams are get",
         'status'=> true,
         'data'=> $exams]
    ,200);
    }else{
        return response(401);
    }
  }
}
