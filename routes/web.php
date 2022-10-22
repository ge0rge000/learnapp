<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\HomeController;
///unit
use App\Http\Livewire\Admin\Unit\UnitAddComonent;
use App\Http\Livewire\Admin\Unit\EditAddComponent;
use App\Http\Livewire\Admin\Unit\UnitShowComonent;

///video

use App\Http\Livewire\Admin\Video\SELECTYEARVIDEO;
use App\Http\Livewire\Admin\Video\VideoAddController;
use App\Http\Livewire\Admin\Video\VideoEditController;
use App\Http\Livewire\Admin\Video\ShowVideoComponent;
use App\Http\Livewire\Admin\Video\ShowVideoDataComponent;
use App\Http\Controllers\UploadVideoController;
///Exam
use App\Http\Livewire\Admin\Exam\SELECTYEAREXAM;
use App\Http\Livewire\Admin\Exam\ExamAddController;
use App\Http\Livewire\Admin\Exam\ShowExamComponent;
use App\Http\Livewire\Admin\Exam\ExamEditController;
use App\Http\Livewire\Admin\Exam\PasswordExamComponent;
use App\Http\Livewire\Admin\Exam\PasswordPrintComponent;


//question
use App\Http\Livewire\Admin\Question\AddQuestionChoice;
use App\Http\Livewire\Admin\Question\AddQuestionPargraph;
use App\Http\Livewire\Admin\Question\AddQuestionBlock;
use App\Http\Livewire\Admin\Question\SelectTypeChoiceComponent;

use App\Http\Livewire\Admin\Question\EditQuestionsExam;
use App\Http\Livewire\Admin\Question\ShowQuestionsExam;
use App\Http\Livewire\Admin\Question\EditQuestionPargraph;
use App\Http\Livewire\Admin\Question\EditQuestionBlock;



///student

use App\Http\Livewire\Admin\Student\ShowStudentComponent;

use App\Http\Livewire\Admin\Student\ShowStudentExam;
use App\Http\Livewire\Admin\Student\ShowStudentExamChoiceQuestion;
use App\Http\Livewire\Admin\Student\ShowStudentExamPargraphQuestion;

use App\Http\Livewire\Admin\Student\ShowStudentBlock;

///slider
use App\Http\Livewire\Admin\Slider\SlideAddComponent;
use App\Http\Livewire\Admin\Slider\SliderEditComponent;
use App\Http\Livewire\Admin\Slider\SlidershowComponent;


////question Money

use App\Http\Livewire\Admin\QuestionMOney\AddMoneyBlockComponent;
use App\Http\Livewire\Admin\QuestionMOney\AddMoneyQuestionComponent;
use App\Http\Livewire\Admin\QuestionMOney\SelectTypeQuestionComponent;
use App\Http\Livewire\Admin\QuestionMOney\ShowMoneyQuestionComponent;
use App\Http\Livewire\Admin\QuestionMOney\EditMoneyQuestionComponent;

use App\Http\Livewire\Admin\QuestionMOney\SelectTypeMoneyQuestion;
use App\Http\Livewire\Admin\QuestionMOney\ShowBlockMoneyQuestion;
use App\Http\Livewire\Admin\QuestionMOney\EditBlockMoneyQuestion;


use App\Http\Livewire\HOME;


// Route::get('/',HOME::class);


///for admin
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function(){
  Route::get('/',HomeController::class)->name("home_admin");
  ///unit
  Route::get('showunits',UnitShowComonent::class)->name("show_unit");
  Route::get('addunit',UnitAddComonent::class)->name("add_unit");
  Route::get('editunit/{ide}',EditAddComponent::class)->name("edit_unit");
  ///video


Route::get('add_year_video',SELECTYEARVIDEO::class)->name("select_year_video");

Route::get('addvideo/{year}',VideoAddController::class)->name("add_video");
Route::get('editvideo/{id_video}',VideoEditController::class)->name("edit_video");
Route::get('show_videos/{year_type}',ShowVideoComponent::class)->name("show_video");
Route::get("show_video_data/{ide}",ShowVideoDataComponent::class)->name("show_data_video");
  //kamel
Route::post('upload_video',[UploadVideoController::class,'uploadLargeFiles'])->name('upload.video');
///exam
Route::get('add_year_exam',SELECTYEAREXAM::class)->name("select_year_exam");
Route::get('add_exam/{year}',ExamAddController::class)->name("add_exam");
Route::get('edit_exam/{id_exam}',ExamEditController::class)->name("edit_exam");
Route::get('show_exams/{year_type}',ShowExamComponent::class)->name("show_exam");
Route::get('password_exam/{id_exam}',PasswordExamComponent::class)->name("password_exam");
Route::get('printpass/{id_exam}',PasswordPrintComponent::class)->name("print_pass");



///questions

Route::get('add_question/{type}/{id_exam}',AddQuestionChoice::class)->name("add_question");


Route::get('add_pargraquestion/{id_exam}',AddQuestionPargraph::class)->name("add_question_pargraph");
Route::get('blockquestion/{id_exam}',AddQuestionBlock::class)->name("add_block_question");

Route::get('show_questions/{id_exam}',ShowQuestionsExam::class)->name("show_question");

Route::get('question/{question_id}',EditQuestionsExam::class)->name("edit_question");


Route::get('editpargraph/{question_id}',EditQuestionPargraph::class)->name("edit_pargraph");
Route::get('blockedit/{question_id}',EditQuestionBlock::class)->name("edit_block");


Route::get('questiontype/{id_exam}',SelectTypeChoiceComponent::class)->name("question_choice_type");

///students
//Route::get('yearstudent',SelectYeartudentComponent::class)->name("select_year_student");
Route::get('show_student/{year_type}',ShowStudentComponent::class)->name("show_student");
Route::get('exams_student/{student_id}',ShowStudentExam::class)->name("student_all_exams");
Route::get('choiceexams_student/{student_id}/{exam_id}',ShowStudentExamChoiceQuestion::class)->name("student_choice_exam");
Route::get('pargraphexams_student/{student_id}/{exam_id}',ShowStudentExamPargraphQuestion::class)->name("student_pargraph_exam");
Route::get('blockexams_student/{student_id}/{exam_id}',ShowStudentBlock::class)->name("student_block_exam");
///sliders
Route::get('add_slider',SlideAddComponent::class)->name("add_slider");
Route::get('edit_slider/{id_slider}',SliderEditComponent::class)->name("edit_slider");
Route::get('show_slider',SlidershowComponent::class)->name("show_slider");


///QuestionMoney
Route::get('monquestiontype',SelectTypeQuestionComponent::class)->name("monquestiontype");
Route::get('moneyadd_question/{type}',AddMoneyQuestionComponent::class)->name("moneyadd_question");
Route::get('moneyedit_question/{type}/{ide}',EditMoneyQuestionComponent::class)->name("moneyedit_question");



Route::get('admoney_block',AddMoneyBlockComponent::class)->name("admoney_block");
Route::get('moneyshowquestuion/{year_type}',ShowMoneyQuestionComponent::class)->name("moneyshowquestuion");

Route::get('selectshowquestuion/{year_type}/{type}',SelectTypeMoneyQuestion::class)->name("selectshowquestuion");

Route::get('editblockmoney/{ide}/{year_type}',EditBlockMoneyQuestion::class)->name("editblockmoney");

Route::get('showblockmoney/{ide}',ShowBlockMoneyQuestion::class)->name("showblockmoney");

});



