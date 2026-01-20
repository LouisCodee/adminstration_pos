<?php

namespace App\Livewire\Branch;

use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BranchCreate extends Component
{
    public string $name = '';
    public ?string $location = null;
    public bool $is_main = false;

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'is_main' => 'boolean',
        ]);

        $user = Auth::user();

        if (!$user->hasRole(['manager', 'super-admin'])) {
            abort(403);
        }

        // Prevent multiple main branches
        if ($this->is_main) {
            Branch::where('business_id', $user->business_id)
                ->update(['is_main' => false]);
        }

        Branch::create([
            'business_id' => $user->business_id, // 🔒 enforced
            'name' => $this->name,
            'location' => $this->location,
            'is_main' => $this->is_main,
        ]);

        session()->flash('success', 'Branch created successfully.');

        $this->reset(['name', 'location', 'is_main']);
    }

    public function render()
    {
        return view('livewire.branch.branch-create');
    }
}
