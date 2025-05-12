<section class="w-full">
    @include('partials.users-heading')

    <x-layouts.users.layout :heading="__('Users')" :subheading="__('List of all user accounts')">        
        <div class="my-6 w-full space-y-6">

            <!-- Session Status -->
            <x-auth-session-status class="text-center" :status="session('status')" />

            @if (Auth::user()->can('viewAny', App\Models\User::class))
                <div class="min-w-full">
                    <flux:table class="min-w-full">
                        <flux:table.columns>
                            <flux:table.column>ID</flux:table.column>
                            <flux:table.column>Name</flux:table.column>
                            <flux:table.column>Email</flux:table.column>
                            <flux:table.column>Role</flux:table.column>
                            <flux:table.column>Action</flux:table.column>
                        </flux:table.columns>

                        <flux:table.rows>                    
                            @foreach (\App\Models\User::all() as $user)
                                <flux:table.row>
                                    <flux:table.cell wire:key="{{ $user->id }}">{{ $user->id }}</flux:table.cell>
                                    <flux:table.cell wire:key="{{ $user->id }}">{{ $user->name }}</flux:table.cell>
                                    <flux:table.cell wire:key="{{ $user->id }}">{{ $user->email }}</flux:table.cell>
                                    <flux:table.cell wire:key="{{ $user->id }}">{{ $user->role->role_name }}</flux:table.cell>
                                    <flux:table.cell>
                                        <div class="flex items-center space-x-6">
                                            <flux:button href="{{ route('users.update', $user) }}" variant="filled"
                                                size="sm">Edit</flux:button>                                    

                                            <flux:modal.trigger :name="'user_deletion'.$user->id">
                                                <flux:button variant="primary" size="sm">Delete</flux:button>
                                            </flux:modal.trigger>

                                            <flux:modal :name="'user_deletion'.$user->id" class="max-w-lg">
                                                <div class="space-y-6">
                                                    <div>
                                                        <flux:heading size="lg">Delete User Account</flux:heading>
                                                        <flux:text class="mt-2 mb-4">
                                                            <p>Are you sure you want to delete this account?</p>
                                                            <p>This action can not be reversed.</p>
                                                        </flux:text>                               
                                                    
                                                    </div>
                                                </div>

                                                <div class="flex gap-2">                                         
                                                    <flux:spacer />
                                                    <flux:modal.close>
                                                        <flux:button variant="ghost" size="sm">Cancel</flux:button>
                                                    </flux:modal.close>
                                                    <flux:button wire:click="delete_user({{ $user->id }})" variant="danger" size="sm" :loading="true">Delete</flux:button>                                            
                                                </div>

                                            </flux:modal>                                    

                                        </div>
                                    </flux:table.cell>
                                </flux:table.row>
                            @endforeach     
                        </flux:table.rows>
                    </flux:table>
                <div>
                {{-- <table class="min-w-full text-zinc-800 divide-y divide-zinc-800/10 dark:divide-white/20">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">ID</th>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Name</th>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Email</th>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Role</th>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Action</th>                        
                        </tr>
                    </thead>
                    <tbody class="min-w-full text-zinc-800 divide-y divide-zinc-800/10 dark:divide-white/20">
                        @foreach (\App\Models\User::all() as $user)
                            <tr>
                                <td wire:key="{{ $user->id }}"
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">
                                    {{ $user->id }}
                                </td>
                                <td wire:key="{{ $user->id }}"
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">
                                    {{ $user->name }}
                                </td>
                                <td wire:key="{{ $user->id }}"
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">
                                    {{ $user->email }}
                                </td>
                                <td wire:key="{{ $user->id }}"
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">
                                    {{ $user->role->role_name }}
                                </td>
                                <td class="whitespace-nowrap py-4 pl-4 text-sm font-medium sm:pl-0">
                                    <div class="flex items-center space-x-6">
                                        <flux:button href="{{ route('users.update', $user) }}" variant="filled"
                                            size="sm">Edit</flux:button>                                    

                                        <flux:modal.trigger :name="'user_deletion'.$user->id">
                                            <flux:button variant="primary" size="sm">Delete</flux:button>
                                        </flux:modal.trigger>

                                        <flux:modal :name="'user_deletion'.$user->id" class="max-w-lg">
                                            <div class="space-y-6">
                                                <div>
                                                    <flux:heading size="lg">Delete User Account</flux:heading>
                                                    <flux:text class="mt-2 mb-4">
                                                        <p>Are you sure you want to delete this account?</p>
                                                        <p>This action can not be reversed.</p>
                                                    </flux:text>                               
                                                
                                                </div>
                                            </div>

                                            <div class="flex gap-2">                                         
                                                <flux:spacer />
                                                <flux:modal.close>
                                                    <flux:button variant="ghost" size="sm">Cancel</flux:button>
                                                </flux:modal.close>
                                                <flux:button wire:click="delete_user({{ $user->id }})" variant="danger" size="sm" :loading="true">Delete</flux:button>                                                
                                            </div>

                                        </flux:modal>                                    

                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table> --}}
            @endif 
        </div>
    </x-layouts.users.layout>
</section>
