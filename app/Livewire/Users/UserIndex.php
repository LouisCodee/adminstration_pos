<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserIndex extends Component
{
    public function render()
    {
        $authUser = Auth::user();

        $users = User::query()
            ->when($authUser->hasRole('manager'), function ($query) use ($authUser) {
                $query->where('business_id', $authUser->business_id)
                    ->where('branch_id', $authUser->branch_id);
            })
            ->when($authUser->hasRole('worker'), function ($query) use ($authUser) {
                $query->where('id', $authUser->id);
            })
            ->get();

        return view('livewire.users.user-index', compact('users'));
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);

        // Extra protection
        if (
            auth()->user()->hasRole('manager') &&
            (
                $user->business_id !== auth()->user()->business_id ||
                $user->branch_id !== auth()->user()->branch_id
            )
        ) {
            abort(403);
        }

        $user->delete();
    }
}
