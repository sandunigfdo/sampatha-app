<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListUsers extends Component
{
      /**
     * Delete the selected user
     */ 
    public function delete_user($id, User $user): void
    {
       if(Auth::user()->cannot('delete', $user)) {
            abort(403);
       }

        // Delete the selected user

        $user = User::findOrFail($id);                     
        $user->delete();        
        
    }     

    public function render()
    {
        return view('livewire.users.list-users');
    }
}
