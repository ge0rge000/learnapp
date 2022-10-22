<?php

namespace App\Http\Livewire\Admin\Video;

use Livewire\Component;
use App\Models\Video;
use Livewire\WithFileUploads;
use Storage;

class VideoEditController extends Component
{
    use WithFileUploads;
    public $name_video;
    public $id_video;
    public $image_video;
    public $image_video_new;
    protected $rules = [
        'name_video' => 'required',

    ];
    public function mount($id_video){
        $video=Video::where("id",$id_video)->first();
        $this->name_video=$video->name_video;
        $this->image_video=$video->image_video;
        $this->id_video=$video->id;
    }
    public function edit_video(){
        $this->validate();
        $video=Video::where("id",$this->id_video)->first();
        if($this->image_video_new!=null){
            $imagename=time().'.'.$this->image_video_new->extension();

        $disk = Storage::disk('photos');
        $path = $disk->putFileAs('videos', $this->image_video_new, $imagename);
        $video->image_video=$path;
        }
        $video->name_video=$this->name_video;
        $video->save();

        $unit_data=($video->units)[0];


       return redirect()->route("show_video",['year_type'=>$unit_data->year_type]);
    }
    public function render()
    {
        return view('livewire.admin.video.video-edit-controller')->layout('layouts.admin');
    }
}
