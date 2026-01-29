<?php

namespace App\Livewire\Business;

use App\Models\Business;
use Livewire\Component;

class BusinessShow extends Component
{

    public $business;

    public function mount($id)
    {
        $this->business = Business::find($id);
    }

    public function render()
    {
        return view('livewire.business.business-show');
    }
}
