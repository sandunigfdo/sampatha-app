<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ListUsers extends Component
{
    public $users;
    

    public function mount(){
        
        if (Auth::user()->role_id === 2){
            throw new HttpException(403, 'Unauthorized to view user list.');
        }
        else {
            $this->users = User::all();
        }
    }

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
        
        $this->dispatch('user-deleted');
        
    }    
    

    public function render()
    {        
        return view('livewire.users.list-users');
    }
}
