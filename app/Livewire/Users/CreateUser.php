<?php

namespace App\Livewire\Users;

use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Component;
use Illuminate\Support\Str;


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
    public function create_user(User $user): void    
    {                    
        /**
         * Determine whether the user can create a new user
         */
        if (Auth::user()->cannot('create',$user)){
           
            abort(403);
        }

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

    public function render()
    {
        return view('livewire.users.create-user');
    }
}
