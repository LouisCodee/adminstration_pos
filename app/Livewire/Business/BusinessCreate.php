<?php

namespace App\Livewire\Business;

use App\Models\Business;
use Livewire\Component;

class BusinessCreate extends Component
{

    public $name;
    public function render()
    {
        return view('livewire.business.business-create');
    }

    public function submit()
    {
        $this->validate([
            "name" => "required",
        ]);

        Business::create([
            "name" => $this->name,
        ]);

        // $business->syncRoles($this->roles);


        return to_route("business.index");
    }
}
