<?php

namespace App\Http\Controllers\Api\Exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrueAnswer;
use App\Models\ChoiceResult;
use App\Models\PargraphResult;
use App\Models\FinalResult;


class ResultComponent extends Controller
{

    public function checkanswerchoice(Request $request){

            if($request->get('choices')==null){

                return response(
                    [ 'message'=>"no choice contain",
                     'status'=> false,
                     'data'=> null]
                ,200);

            }else{
            if(ChoiceResult::where("exam_id", $request->get('exam_id'))->where("user_id", $request->get('user_id'))->exists()) {
                return response(
                    [ 'message'=>"result are correct before",
                     'status'=> false,
                     'data'=> null]
                ,200);
            }else{
                $choicestudent=[];

                $choices = $request->get('choices');
                $result=0;
                foreach ($choices as $key=>$choice) {

                  array_push($choicestudent,array("question_id" => $choice['question_id'],"choice" => $choice['answer'],'value'=> 0));

               $choice_true=TrueAnswer::where('question_id',$choice['question_id'])->first();

               if($choice_true!=null)
               {
                $true_choice=$choice_true->ans;

                    if ($true_choice==$choice["answer"])
                    {
                        $choicestudent[$key]["value"]=1;

                    $result=$result+$choice_true->question->mark_question;

                    }
               }

                }
             $data=ChoiceResult::create(
             [
                'choices' => $choicestudent,
                'exam_id' =>$request->get('exam_id'),
                'user_id' => $request->get('user_id'),
                'result' => $result,
            ]
            );

            }
            return response(
                [ 'message'=>"result are get",
                 'status'=> true,
                 'data'=> $data]
            ,200);

    }
}



public function checkanswerpar(Request $request){

    if($request->get('pargraph')==null){
        return response(
            [ 'message'=>"no pargraph contain and result choice are get",
             'status'=> false,
             'data'=> null]
        ,200);
    }else{
    if(PargraphResult::where("exam_id", $request->get('exam_id'))->where("user_id", $request->get('user_id'))->exists()) {
        return response(
            [ 'message'=>"result are correct before",
             'status'=> false,
             'data'=> null]
        ,200);
    }else{
        $pargraphstudent=[];

        $pargraphs = $request->get('pargraph');
        $result=0;
        foreach ($pargraphs as $key=>$pargraph) {

          array_push($pargraphstudent,array("question_id" => $pargraph['question_id'],"answer" => $pargraph['answer'],'value'=> 0));

        }


     $data=PargraphResult::create(
     [
        'answers' => $pargraphstudent,
        'exam_id' =>$request->get('exam_id'),
        'user_id' => $request->get('user_id'),
        'result' => 0,
    ]
    );
    }
    return response(
        [ 'message'=>"result will be corret in future",
         'status'=> true,
         'data'=> $data]
    ,200);

    }

}

    public function getResultExam(Request $request){

        $resultall=0;
        $cho=ChoiceResult::where("exam_id", $request->get('exam_id'))->where("user_id", $request->get('user_id'))->exists();
        $par=PargraphResult::where("exam_id", $request->get('exam_id'))->where("user_id", $request->get('user_id'))->exists();
        $checkexist=FinalResult::where("exam_id", $request->get('exam_id'))->where("user_id", $request->get('user_id'))->exists();
        if($checkexist==null){
            if($cho || $par) {

                ///choice only

                if($cho!=null & $par==null ){

                    $choiceresult=ChoiceResult::where("exam_id", $request->get('exam_id'))->
                    where("user_id", $request->get('user_id'))->select("result")->first();
                    $resultall=$resultall+$choiceresult->result;
                    $finalresult=new FinalResult();
                    $finalresult->exam_id=$request->get('exam_id');
                    $finalresult->user_id=$request->get('user_id');
                    $finalresult->show_Result="1";
                    $finalresult->result=$resultall;
                    $finalresult->save();
                    return response(
                        [ 'message'=>"Result is done",
                         'status'=> true,
                         'result'=> $resultall
                         ]
                    ,200);
                }
                 ///pargraph only
                if($par!=null & $cho==null){

                    $finalresult=new FinalResult();
                    $finalresult->exam_id=$request->get('exam_id');
                    $finalresult->user_id=$request->get('user_id');
                    $finalresult->show_Result="0";
                    $finalresult->result=0;
                    $finalresult->save();
                    return response(
                        [ 'message'=>"the result will show another time",
                         'status'=> true,
                         ]
                    ,200);
                }
            ///pargraph and choice
                if($par!=null & $cho!=null){

                    $choiceresult=ChoiceResult::where("exam_id", $request->get('exam_id'))->
                    where("user_id", $request->get('user_id'))->select("result")->first();
                    $resultall=$resultall+$choiceresult->result;
                    $finalresult=new FinalResult();
                    $finalresult->exam_id=$request->get('exam_id');
                    $finalresult->user_id=$request->get('user_id');
                    $finalresult->show_Result="0";
                    $finalresult->result=$resultall;
                    $finalresult->save();
                    return response(
                        [ 'message'=>"the result will show another time",
                         'status'=> true,
                         ]
                    ,200);
                }
            }else{
                return response(
                    [ 'message'=>"you donnot do exam",
                     'status'=> false,
                     'data'=> null]
                ,200);
            }
        }else{
            return response(
                [ 'message'=>"you send result before",
                 'status'=> false,
                 'data'=> null]
            ,200);
        }

    }

}




