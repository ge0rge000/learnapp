<?php

namespace App\Http\Livewire\Admin\Unit;

use Livewire\Component;
use App\Models\Unit;

class UnitShowComonent extends Component
{

    public $year_type;
    public function render()
    {
        $units=Unit::where("year_type",$this->year_type)->get();
        return view('livewire.admin.unit.unit-show-comonent',['units'=>$units])->layout('layouts.admin');
    }
}
