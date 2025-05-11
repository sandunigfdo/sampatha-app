{{-- <div class="flex items-start max-md:flex-col">       
    <div class="flex-1 self-stretch max-md:pt-6">
        <div class="mt-5 w-full max-w-lg">            
            {{ $slot }}            
        </div>
    </div>
</div> --}}


<div class="flex items-start max-md:flex-col">
    {{-- <div class="me-10 w-full pb-4 md:w-[220px]">
        <flux:navlist>            
            <flux:navlist.item :href="route('users.list')" wire:navigate>{{ __('List Users') }}</flux:navlist.item>                  
        </flux:navlist>
    </div> --}}

    <flux:separator class="md:hidden" />

    <div class="flex-1 self-stretch max-md:pt-6">
        <flux:heading>{{ $heading ?? '' }}</flux:heading>
        <flux:subheading>{{ $subheading ?? '' }}</flux:subheading>

        <div class="mt-5 w-full max-w-lg">
            {{ $slot }}
        </div>       

    </div>

    {{-- <div class="flex flex-col md:flex-row gap-6 flex-1 self-stretch max-md:pt-6">
        <div class="w-full md:w-1/2"> 
            <flux:heading>{{ $heading ?? '' }}</flux:heading>
            <flux:subheading>{{ $subheading ?? '' }}</flux:subheading>

            <div class="mt-5 w-full">
                {{ $slot }}
            </div>
        </div>
        <div class="w-full md:w-1/4 self-stretch">
            {{ $right ?? '' }}
        </div>
    </div> --}}

    
</div>

