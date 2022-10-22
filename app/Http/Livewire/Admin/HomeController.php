<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
class HomeController extends Component
{
    public $search;
    public $case=0;
    public $student;

    public function editreverse($student_id){
        $student=User::where("id",$student_id)->first();
        $student->case_reverse="1";
        $student->save();
    }
    public function deletereverse($student_id){
        $student=User::where("id",$student_id)->first();
        $student->case_reverse="0";
        $student->save();
    }
    public function editreverseque($student_id){
        $student=User::where("id",$student_id)->first();
        $student->reverse_question="1";
        $student->save();
    }
    public function deletereverseque($student_id){
        $student=User::where("id",$student_id)->first();
        $student->reverse_question="0";
        $student->save();
    }

    public function deletestudent($student_id){
        $student=User::where("id",$student_id)->first();
        $student->delete();
    }
    public function getstudent(){
     $this->student=User::where("mobile_phone",$this->search)->first();
     $this->case=1;
    }

    public function render()
    {
        return view('livewire.admin.home-controller')->layout('layouts.admin');
    }
}
