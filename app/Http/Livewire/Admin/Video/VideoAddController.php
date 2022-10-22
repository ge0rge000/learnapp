<?php

namespace App\Http\Livewire\Admin\Video;

use Livewire\Component;
use App\Models\Video;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use Storage;
use App\Models\Unit;
use App\Models\VideoUnit;

class VideoAddController extends Component
{
    use WithFileUploads;


    public $video;
    public $video_id;
    public $unit_selected = [];
    public $name_video;
    public $case_video=0;
    public $year;
    public $image_video;
    protected $rules = [
        'name_video' => 'required',
        'image_video'=>'required'
    ];
    public function mount(){
        $this->year;
    }
    public function unit_relate_video(){

        $this->validate();
        if($this->video){

            $video_last = $this->video;
            $video_last->name_video=$this->name_video;
            if($this->image_video!=null){
                $imagename=time().'.'.$this->image_video->extension();
                $disk = Storage::disk('photos');
                $path = $disk->putFileAs('videos', $this->image_video, $imagename);
                $video_last->image_video=$path;
            }
            $video_last->save();
        }else{

            $video_last=Video::latest()->first();
        }

        if($video_last->units->contains($this->unit_selected)){
            session()->flash("message","you relate this unit to video before");
        }else{
            // $unitvideo=new VideoUnit;
            // $unitvideo->unit_id=$this->unit;
            // $unitvideo->video_id=$video_last->id;
            // $unitvideo->save();

            $video_last->units()->attach($this->unit_selected);  // ده الصح بتاع many to many
            session()->flash("message","you relate this unit to video ");
            return redirect()->route("show_video",['year_type'=>$this->year]);
        }


    }
    public function render()
    {
        $this->case_video;
        if($this->video_id != null){
            $this->video = Video::findOrFail($this->video_id);
        }else{

            $this->video = Video::latest()->first();
        }
        if($this->video!=null){
            $video_last_name=$this->video->name_video;
        }else{
            $video_last_name="no exist";
        }
        $units=Unit::where("year_type",$this->year)->get();
        return view('livewire.admin.video.video-add-controller',['units'=>$units,'video_last_name'=>$video_last_name])->layout('layouts.admin');
    }
}
