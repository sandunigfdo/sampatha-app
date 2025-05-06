<section class="w-full">
    @include('partials.users-heading')

    <x-layouts.users.layout :heading="__('Users')" :subheading="__('List of all user accounts')">       
        {{-- <form wire:submit="updateProfileInformation" class="my-6 w-full space-y-6">
            <flux:input wire:model="name" :label="__('Name')" type="text" required autofocus autocomplete="name" />

            <div>
                <flux:input wire:model="email" :label="__('Email')" type="email" required autocomplete="email" />

                @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
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
        <div class="my-6 w-full space-y-6">

            <!-- Session Status -->
            <x-auth-session-status class="text-center" :status="session('status')" />            

            <table class="min-w-full divide-y divide-gray-600">
                <thead>
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">ID</th>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Name</th>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Email</th>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Role</th> 
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Action</th> 
                                              
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-600">
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
                            <td
                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium sm:pl-0">
                                <a href="{{ route('update_users', $user) }}" class="text-yellow-200 hover:text-yellow-300">Edit
                                    <span class="sr-only"></span>
                                </a>
                                <a href="#" class="text-red-400 hover:text-red-600 pl-6">Delete
                                    <span class="sr-only"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                   
                </tbody>
            </table>

            {{-- <div class="flex items-center gap-4">
                    <div class="flex items-center justify-end">
                        <flux:button variant="primary" type="submit" class="w-full">{{ __('Add User') }}</flux:button>
                    </div>
                    <x-action-message class="me-3" on="user-created">
                        {{ __('Saved') }}
                    </x-action-message>
                </div> --}}

            </form>

            <x-slot name="right">
                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                    <flux:button href="{{ route('create_user') }}" icon:trailing="user-plus">Add User</flux:button>
                </div>
            </x-slot>
        

        </div>
    </x-layouts.users.layout>
</section>

