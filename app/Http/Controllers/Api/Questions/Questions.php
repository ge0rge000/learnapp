<?php

namespace App\Http\Controllers\Api\Questions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuestionChoice;
use App\Models\QuestionParagraph;
use Illuminate\Support\Facades\DB;

class Questions extends Controller
{
    public function returnquestions($id_exam){

          $questionschoice=QuestionChoice::where("exam_id",$id_exam)->with("trueanswer")->with("block")->get();
           $QuestionsPar=QuestionParagraph::where("exam_id",$id_exam)->get();
          $array =$questionschoice->merge($QuestionsPar);


          return response(
            [ 'message'=>"question are get",
             'status'=> true,
             'question'=> $array,
            ]
        ,200);

      }
}
