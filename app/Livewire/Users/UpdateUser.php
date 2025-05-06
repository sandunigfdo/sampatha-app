<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UpdateUser extends Component
{
    public User $user;
    
    public string $name = '';

    public string $email = '';

    public string $role = '';

    /**
     * Mount the component.
     */
    public function mount(User $user): void
    {
        // dd($this->user->role->role_name);
        $this->user = $user;
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->role = $this->user->role->id;

    }

    /**
     * Update the user information for the selected user
     */
    public function update_user(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required', 
                'string', 
                'lowercase', 
                'email', 
                'max:255', 
                Rule::unique(User::class)->ignore($this->user->id),
            ],  

            'role' => ['required'],
        ]);
        
        $this->user->name = $validated['name'];   
        $this->user->email = $validated['email'];   
        $this->user->role_id = $validated['role'];
        $this->user->save();      
        
        $this->dispatch('user-updated');
    } 

    public function render()
    {
        return view('livewire.users.update-user');
    }
}
