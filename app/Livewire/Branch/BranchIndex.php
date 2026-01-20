<?php

namespace App\Livewire\Branch;

use Livewire\Component;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;

class BranchIndex extends Component
{
    public function render()
    {
        $branches = Branch::forUser(Auth::user())
            ->latest()
            ->get();

        return view('livewire.branch.branch-index', [
            'branches' => $branches,
        ]);
    }
}
