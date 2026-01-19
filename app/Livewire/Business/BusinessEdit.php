<?php

namespace App\Livewire\Business;

use App\Models\Business;
use Livewire\Component;

class BusinessEdit extends Component
{

    public $business, $name;

    public function mount($id)
    {
        $this->business = Business::find($id);
        $this->name = $this->business->name;
    }

    public function render()
    {
        return view('livewire.business.business-edit');
    }

     public function submit()
    {
        $this->validate([
            "name" => "required",
        ]);

        $this->business->name = $this->name;

        $this->business->save();

        return to_route("business.index");
    }
}
