<div class="flex items-start max-md:flex-col">
    {{-- <div class="me-10 w-full pb-4 md:w-[220px]">
        <flux:navlist>            
            <flux:navlist.item :href="route('users.list')" wire:navigate>{{ __('List Users') }}</flux:navlist.item>                  
        </flux:navlist>
    </div> --}}

    <flux:separator class="md:hidden" />

    <div class="flex-1 self-stretch max-md:pt-6">
        <div class="flex mx-auto items-center justify-between">
            <div>
                <flux:heading>{{ $heading ?? '' }}</flux:heading>
                <flux:subheading>{{ $subheading ?? '' }}</flux:subheading>
            </div>
            <div>
            
                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                    <flux:button href="{{ route('users.create') }}" icon:trailing="user-plus">Add User</flux:button>
                </div>
            </div>
        </div>

        <div class="mt-5 w-full">
            {{ $slot }}
        </div>       

    </div>    
</div>

