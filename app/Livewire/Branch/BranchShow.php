<?php

namespace App\Livewire\Branch;

use App\Models\Branch;
use Livewire\Component;

class BranchShow extends Component
{

    public $branch;

    public function mount($id)
    {
        $this->branch = Branch::find($id);
    }

    public function render()
    {
        return view('livewire.branch.branch-show');
    }
}
