<?php

namespace App\Http\Livewire\Admin\Unit;

use Livewire\Component;
use App\Models\Unit;
use Livewire\WithFileUploads;
use Storage;
use App\Models\Video;
class EditAddComponent extends Component
{
    use WithFileUploads;

    public $name_unit;

    public $year_unit;
    public $ide;
    public $image_unit;
    public $image_unit_new;

    public function mount($ide){
        $unit=Unit::findOrFail($ide);
        // dd($unit->videos);
        $this->name_unit=$unit->name;
        $this->year_unit=$unit->year_type;
        $this->image_unit=$unit->image_unit;
        $this->ide=$ide;

    }
    protected $rules = [
        'name_unit' => 'required',
        'year_unit' => 'required',
        'image_unit'=>'required'
    ];
    public function edit_unit(){

        $this->validate();
        $unit=Unit::findOrFail($this->ide);
        // dd($unit);
                // شغالة اهيه  عايز تعمل ا ايه هنا
            $unit->name=$this->name_unit;
            if($this->year_unit!==""){
            $unit->year_type=$this->year_unit;
            }

            if($this->image_unit_new!=null){
                $imagename=time().'.'.$this->image_unit_new->extension();

            $disk = Storage::disk('photos');
            $path = $disk->putFileAs('units', $this->image_unit_new, $imagename);
                //   $this->image_unit->storeAs('app/photos/units',$imagename);
              $unit->image_unit=$path;
            }
            $unit->save();
            return redirect()->route("show_unit");


    }
    public function render()
    {
        return view('livewire.admin.unit.edit-add-component')->layout('layouts.admin');
    }
}
