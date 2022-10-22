<?php

namespace App\Http\Livewire\Admin\Unit;

use Livewire\Component;
use App\Models\Unit;
use Livewire\WithFileUploads;
use Storage;
class UnitAddComonent extends Component
{
      use WithFileUploads;
    public $name_unit;

    public $year_unit;
    public $image_unit;
    protected $rules = [
        'name_unit' => 'required',
        'year_unit' => 'required',
        'image_unit'=>'required'
    ];


    public function create_unit(){

        $this->validate();
        $unit = new Unit;

        if(Unit::where('name', $this->name_unit)->where('year_type',$this->year_unit)->exists() ){
            session()->flash("message","you add this unit before");
        }else{
            $unit->name=$this->name_unit;
            if($this->year_unit!==""){
            $unit->year_type=$this->year_unit;
            }

            if($this->image_unit!=null){
                $imagename=time().'.'.$this->image_unit->extension();

            $disk = Storage::disk('photos');
            $path = $disk->putFileAs('units', $this->image_unit, $imagename);
              $unit->image_unit=$path;
            }

            $unit->save();
            return redirect()->route("show_unit");
        }

    }
    public function render()
    {
        return view('livewire.admin.unit.unit-add-comonent')->layout('layouts.admin');
    }
}
