<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\Auth\AuthController;

use App\Http\Controllers\Api\Unit\GetUnitComponent;
use App\Http\Controllers\Api\Video\VideosShowComponent;
use App\Http\Controllers\Api\Exam\ExamController;
use App\Http\Controllers\Api\Questions\Questions;
use App\Http\Controllers\Api\Password\GetvalidatePassword;

use App\Http\Controllers\Api\Slider\SliderController;

use App\Http\Controllers\Api\QuestionMoney\QuestionMoneyController;



use App\Http\Controllers\Api\Exam\ResultComponent;

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
Route::post('logout',[AuthController::class,'logout']);

Route::get('sliders',[SliderController::class,'slider']);



    Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('getunits',[GetUnitComponent::class,'getcategory']);
    Route::get('videolechef/{id_unit}',[VideosShowComponent::class,'checkvalidate']);
    Route::get('exams',[ExamController::class,'returnexams']);
    Route::get('questions/{id_exam}',[Questions::class,'returnquestions']);
    Route::get('validatepass/{exam_id}/{password}',[GetvalidatePassword::class,'validatepassword']);
    Route::post('resultchoice',[ResultComponent::class,'checkanswerchoice']);
    Route::post('resultpargraph',[ResultComponent::class,'checkanswerpar']);
    Route::post('resultall',[ResultComponent::class,'getResultExam']);
    Route::get('moneyquestion',[QuestionMoneyController::class,'moneyreturnquestions']);

   } );





