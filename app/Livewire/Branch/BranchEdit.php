<?php

namespace App\Livewire\Branch;

use App\Models\Branch;
use Livewire\Component;

class BranchEdit extends Component
{

    public $branch, $name, $location;

    public function mount($id)
    {
        $this->branch = Branch::find($id);
        $this->name = $this->branch->name;
        $this->location = $this->branch->location;
    }

    public function submit()
    {
        $this->validate([
            "name" => "required",
            "location" => "required",
        ]);

        $this->branch->name = $this->name;
        $this->branch->location = $this->location;

        $this->branch->save();

        return to_route("branch.index");
    }


    public function render()
    {
        return view('livewire.branch.branch-edit');
    }
}
