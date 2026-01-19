<?php

namespace App\Livewire\Business;

use App\Models\Business;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class BusinessIndex extends Component
{
    public function render()
    {
        $user = Auth::user();

        // Super Admin sees all businesses
        if ($user->hasRole('super-admin')) {
            $businesses = Business::latest()->get();
        }
        // Manager sees only their business
        elseif ($user->hasRole('manager')) {
            $businesses = Business::where('id', $user->business_id)->get();
        }
        // Everyone else is forbidden
        else {
            abort(403);
        }

        return view('livewire.business.business-index', [
            'business' => $businesses
        ]);
    }

    public function delete($id)
    {
        $user = Auth::user();

        $business = Business::findOrFail($id);

        // Super Admin can delete any business
        if ($user->hasRole('super-admin')) {
            $business->delete();
            return;
        }

        // Manager can delete ONLY their own business (optional)
        if ($user->hasRole('manager') && $business->id === $user->business_id) {
            $business->delete();
            return;
        }

        abort(403);
    }
}
