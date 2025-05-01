<?php

namespace App\Livewire\Users;

use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CreateUser extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public string $role = '';

    /**
     * Handle an incoming add user request.
     */
    public function create_user(Request $request, User $user): void    
    {              
        /**
         * Determine whether the user can create a new user
         */
        if ($request->user()->can('create',$user)){
            
            $validated = $this->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
                'role' => ['required'],
            ]);
            
            $user = new User();
            $user->name = $validated['name'];
            $user->email = $validated['email'];
            $user->password = Hash::make($validated['password']);
            $user->role_id = $validated['role'];
            $user->save();
    
            $this->dispatch('user-created');
        }
        else{
            abort(403);
            
        }
        
        
        
    }

    public function render()
    {
        return view('livewire.users.create-user');
    }
}
