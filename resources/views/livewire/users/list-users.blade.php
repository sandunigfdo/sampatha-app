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

            @if (Auth::user()->can('viewAny', App\Models\User::class))
                <table class="min-w-full divide-y divide-gray-600">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">ID</th>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Name</th>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Email</th>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Role</th>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Action</th>                        
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
                                                {{-- <flux:button href="{{ route('users.list') }}" variant="filled" size="sm">Cancel</flux:button> --}}
                                            </div>

                                        </flux:modal>                                    

                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @endif          

            </form>

            <x-slot name="right">
                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                    <flux:button href="{{ route('create_user') }}" icon:trailing="user-plus">Add User</flux:button>
                </div>
            </x-slot>


        </div>
    </x-layouts.users.layout>
</section>
