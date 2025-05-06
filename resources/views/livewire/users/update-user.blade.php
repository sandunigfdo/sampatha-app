<section class="w-full">
    @include('partials.users-heading')

    <x-layouts.users.layout :heading="__('Update user')" :subheading="__('Update a user account.')">
        {{-- <form wire:submit="updateProfileInformation" class="my-6 w-full space-y-6">
            <flux:input wire:model="name" :label="__('Name')" type="text" required autofocus autocomplete="name" />

            <div>
                <flux:input wire:model="email" :label="__('Email')" type="email" required autocomplete="email" />

                @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail &&! auth()->user()->hasVerifiedEmail())
                    <div>
                        <flux:text class="mt-4">
                            {{ __('Your email address is unverified.') }}

                            <flux:link class="text-sm cursor-pointer" wire:click.prevent="resendVerificationNotification">
                                {{ __('Click here to re-send the verification email.') }}
                            </flux:link>
                        </flux:text>

                        @if (session('status') === 'verification-link-sent')
                            <flux:text class="mt-2 font-medium !dark:text-green-400 !text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </flux:text>
                        @endif
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full">{{ __('Save') }}</flux:button>
                </div>

                <x-action-message class="me-3" on="profile-updated">
                    {{ __('Saved.') }}
                </x-action-message>
            </div>
        </form> --}}
        
                    
        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />
    
        <form wire:submit="update_user" class="my-6 w-full space-y-6">
            <!-- Name -->
            <flux:input
                wire:model="name"
                :label="__('Name')"
                type="text"
                required
                autofocus
                autocomplete="name"                
                :placeholder="__('Full name')"
            />
    
            <!-- Email Address -->
            <flux:input
                wire:model="email"
                :label="__('Email address')"
                type="email"
                required
                autocomplete="email"
                placeholder="email@example.com"
            />               

            <!-- Role -->                
            <flux:select 
            wire:model="role"                                        
            placeholder="Select role"
            :label="__('User Role')"
            >
                @foreach (\App\Models\Role::all() as $role )
                    <flux:select.option value="{{ $role->id }}">{{ $role->role_name }}</flux:select.option>                    
                @endforeach
                                    
            </flux:select>               
                                    
            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end gap-6">
                    <flux:button variant="primary" type="submit" class="w-full">{{ __('Save') }}</flux:button>
                    <flux:button href="{{ route('list_users') }}" variant="filled" type="submit" class="w-full">{{ __('Cancel') }}</flux:button>
                </div>
               
                <x-action-message class="me-3" on="user-updated">
                    {{ __('Saved') }}
                </x-action-message>
            </div>
                            
        </form>    
    </x-layouts.users.layout>
</section>
