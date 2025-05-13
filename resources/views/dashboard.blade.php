<x-layouts.app :title="__('Dashboard')">
    {{-- <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative rounded-xl">

                <div class="flex-1 self-stretch max-md:pt-6">
                    <flux:heading>Search Member</flux:heading>

                    <div class="mt-5 ml-1 mr-1">                        
                        <flux:input icon="magnifying-glass" placeholder="සාමාජික අංකය" clearable/>
                    </div>

                </div>
            </div>

            <div class="relative aspect-video overflow-hidden">
                
            </div>

            <div class="relative rounded-xl">
                <div class="flex-1 self-stretch max-md:pt-6">
                    <flux:heading>Select Date</flux:heading>

                    <div class="mt-5 ml-1 mr-1">
                        <form class="my-6 space-y-6">
                            
                            <flux:input 
                                wire:model="member_id" 
                                :label="__('සාමාජික අංකය')" 
                                type="text" required
                                autofocus autocomplete="member_id" 
                                :placeholder="__('සාමාජික අංකය')" 
                                clearable
                            />

                            
                            <flux:input type="date" max="2999-12-31" label="Date" />

                            <div class="flex items-center gap-4">
                                <div class="flex items-center justify-end">
                                    <flux:button variant="primary" type="submit" class="w-full" :loading="true">
                                        {{ __('Save') }}</flux:button>
                                </div>

                                <flux:modal.close>
                                    <flux:button href="#" variant="ghost" type="submit" class="w-full">
                                        {{ __('Cancel') }}</flux:button>
                                </flux:modal.close>

                            </div>
                        </form>

                    </div>

                </div>

            </div>

        </div>
    </div> --}}

    <div class="flex h-full w-full">        
        <div class="mt-5 ml-1 mr-1 w-full">          
            
            {{-- First row --}}
            <div class="flex gap-12 pb-8 border-b border-neutral-700">

                <div class="w-1/2 space-y-6">
                    <div class="w-100 space-y-6">
                        <form>
                            <flux:heading>Search Member</flux:heading>

                            <div class="mt-5 ml-1 mr-1">                        
                                <flux:input icon="magnifying-glass" placeholder="සාමාජික අංකය" clearable/>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="w-1/2 space-y-6">
                    <div class="w-100 space-y-6">
                        <form class="my-6 space-y-6">
                            <flux:heading>Select Date</flux:heading>
                            <flux:input 
                                wire:model="member_id" 
                                :label="__('සාමාජික අංකය')" 
                                type="text" required
                                autofocus autocomplete="member_id" 
                                :placeholder="__('සාමාජික අංකය')" 
                                clearable
                            />

                            
                            <flux:input type="date" max="2999-12-31" label="දිනය" />

                            <div class="flex items-center gap-4">
                                <div class="flex items-center justify-end">
                                    <flux:button variant="primary" type="submit" class="w-full" :loading="true" size="sm">
                                        {{ __('Save') }}
                                    </flux:button>
                                </div>

                                <flux:modal.close>
                                    <flux:button href="#" variant="ghost" type="submit" class="w-full" size="sm">
                                        {{ __('Cancel') }}
                                    </flux:button>
                                </flux:modal.close>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div class="flex h-full w-full flex-1 flex-col pt-4">
        <div class="grid auto-rows-min gap-4 md:grid-cols-1">
            <div class="min-w-full">
                <flux:table class="min-w-full">
                    <flux:table.columns>
                        <flux:table.column>Member</flux:table.column>
                        <flux:table.column>Date</flux:table.column>
                        <flux:table.column>Description</flux:table.column>
                        <flux:table.column>Share</flux:table.column>
                        <flux:table.column>Share</flux:table.column>
                        <flux:table.column>Share</flux:table.column>
                        <flux:table.column>LTL FINE</flux:table.column>
                        <flux:table.column>LTL LOAN</flux:table.column>
                        <flux:table.column>LTL INT</flux:table.column>
                        <flux:table.column>LTL INS</flux:table.column>
                        <flux:table.column>LTL BAL</flux:table.column>
                        <flux:table.column>INSURANCE</flux:table.column>
                        <flux:table.column>STL FINE</flux:table.column>
                        <flux:table.column>STL LOAN</flux:table.column>
                        <flux:table.column>STL INT</flux:table.column>
                        <flux:table.column>STL INS</flux:table.column>
                        <flux:table.column>STL BAL</flux:table.column>
                        <flux:table.column>FUNER</flux:table.column>
                        <flux:table.column>FUNER</flux:table.column>
                        <flux:table.column>POSTAL</flux:table.column>
                        <flux:table.column>TOTAL</flux:table.column>
                    </flux:table.columns>

                    <flux:table.rows>
                        <flux:table.row>
                            <flux:table.cell>Lindsey Aminoff</flux:table.cell>
                            <flux:table.cell>Jul 29, 10:45 AM</flux:table.cell>
                            <flux:table.cell>
                                <flux:badge color="green" size="sm" inset="top bottom">Paid</flux:badge>
                            </flux:table.cell>
                            <flux:table.cell variant="strong">$49.00</flux:table.cell>
                        </flux:table.row>

                        <flux:table.row>
                            <flux:table.cell>Hanna Lubin</flux:table.cell>
                            <flux:table.cell>Jul 28, 2:15 PM</flux:table.cell>
                            <flux:table.cell>
                                <flux:badge color="green" size="sm" inset="top bottom">Paid</flux:badge>
                            </flux:table.cell>
                            <flux:table.cell variant="strong">$312.00</flux:table.cell>
                        </flux:table.row>

                        <flux:table.row>
                            <flux:table.cell>Kianna Bushevi</flux:table.cell>
                            <flux:table.cell>Jul 30, 4:05 PM</flux:table.cell>
                            <flux:table.cell>
                                <flux:badge color="zinc" size="sm" inset="top bottom">Refunded</flux:badge>
                            </flux:table.cell>
                            <flux:table.cell variant="strong">$132.00</flux:table.cell>
                        </flux:table.row>

                        <flux:table.row>
                            <flux:table.cell>Gustavo Geidt</flux:table.cell>
                            <flux:table.cell>Jul 27, 9:30 AM</flux:table.cell>
                            <flux:table.cell>
                                <flux:badge color="green" size="sm" inset="top bottom">Paid</flux:badge>
                            </flux:table.cell>
                            <flux:table.cell variant="strong">$31.00</flux:table.cell>
                        </flux:table.row>
                    </flux:table.rows>
                </flux:table>

            </div>
        </div>
    </div>    

    <div class="flex h-full w-full">        
        <div class="mt-5 ml-1 mr-1 w-full">           
            
            <form wire:submit="" class="my-6 w-full">
                {{-- First row --}}
                <div class="flex gap-12 pb-8 border-b border-neutral-700">

                    <div class="w-1/2 space-y-6">
                        <div class="w-100 space-y-6">
                            <flux:heading>කොටස්</flux:heading>
                            {{-- Fine --}}
                            <flux:input 
                                wire:model="fine" 
                                :label="__('දඩ')" 
                                type="text" 
                                required autofocus
                                autocomplete="name" 
                                :placeholder="__('දඩ')" 
                                clearable
                            />
                            
                            {{-- Monthly Payment --}}
                            <flux:input 
                                wire:model="monthly_payment" 
                                :label="__('මාසික ගෙවීම')" 
                                type="text" 
                                required autofocus
                                autocomplete="monthly_payment" 
                                :placeholder="__('මාසික ගෙවීම')" 
                                clearable
                            />
        
                            {{-- Total --}}
                            <flux:input 
                                wire:model="total" 
                                :label="__('එකතුව')" 
                                type="text" 
                                required autofocus
                                autocomplete="total" 
                                :placeholder="__('එකතුව')" 
                                clearable
                            />  
                        </div>
                    </div>
                    
                    <div class="w-1/2 space-y-4">
                        <div class="w-100 space-y-6">
                            <flux:heading>මරණාධාර</flux:heading>
                            {{-- Monthly payment --}}
                            <flux:input 
                                wire:model="another_field" 
                                :label="__('මාසික ගෙවීම')" 
                                type="text" 
                                required autofocus
                                autocomplete="another_field" 
                                :placeholder="__('මාසික ගෙවීම')" 
                                clearable
                            />
            
                            {{-- Total --}}
                            <flux:input 
                                wire:model="other_payment" 
                                :label="__('එකතුව')" 
                                type="text" 
                                required autofocus
                                autocomplete="other_payment" 
                                :placeholder="__('එකතුව')" 
                                clearable
                            />
                        </div>
                    </div>
                </div>

                {{-- Second row --}}
                <div class="flex gap-12 mt-12 pb-8 border-b border-neutral-700">
                    <div class="w-1/2 space-y-6">
                        <div class="w-100 space-y-6">
                            <flux:heading>රක්ෂණ හා ලාභ සම</flux:heading>
                            {{-- Fee --}}
                            <flux:input 
                                wire:model="fee" 
                                :label="__('මුදල')" 
                                type="text" 
                                required autofocus
                                autocomplete="name" 
                                :placeholder="__('මුදල')" 
                                clearable
                            />
                        </div>
                    </div>
                    <div class="w-1/2 space-y-6">
                        <div class="w-100 space-y-6">
                            <flux:heading>විවිද ආදායම් හා තැපැල් ගාස්තු</flux:heading>
                            {{-- Fee --}}
                            <flux:input 
                                wire:model="fee" 
                                :label="__('මුදල')" 
                                type="text" 
                                required autofocus
                                autocomplete="name" 
                                :placeholder="__('මුදල')" 
                                clearable
                            />
                        </div>
                    </div>
                </div>

                {{-- Third row --}}
                <div class="flex gap-12 mt-12 pb-8 border-b border-neutral-700">
                    <div class="w-1/2 space-y-6">
                        <div class="w-100 space-y-6">
                            <flux:heading>දිගු කාලීන ණය</flux:heading>
                            {{-- Fine --}}
                            <flux:input 
                                wire:model="fine" 
                                :label="__('දඩ')" 
                                type="text" 
                                required autofocus
                                autocomplete="fine" 
                                :placeholder="__('දඩ')" 
                                clearable
                            />
                            {{-- Fee --}}
                            <flux:input 
                                wire:model="fee" 
                                :label="__('ණය මුදල')" 
                                type="text" 
                                required autofocus
                                autocomplete="fee" 
                                :placeholder="__('ණය මුදල')" 
                                clearable
                            />
                            {{-- Interest --}}
                            <flux:input 
                                wire:model="interest" 
                                :label="__('පොළිය')" 
                                type="text" 
                                required autofocus
                                autocomplete="interest" 
                                :placeholder="__('පොළිය')"
                                clearable 
                            />
                            {{-- Installment --}}
                            <flux:input 
                                wire:model="installment" 
                                :label="__('වාරිකය')" 
                                type="text" 
                                required autofocus
                                autocomplete="installment" 
                                :placeholder="__('වාරිකය')" 
                                clearable
                            />
                            {{-- Balance --}}
                            <flux:input 
                                wire:model="balance" 
                                :label="__('ශේෂය')" 
                                type="text" 
                                required autofocus
                                autocomplete="balance" 
                                :placeholder="__('ශේෂය')" 
                                clearable
                            />
                        </div>
                    </div>
                    <div class="w-1/2 space-y-6">
                        <div class="w-100 space-y-6">
                            <flux:heading>කෙටි කාලීන ණය</flux:heading>
                            {{-- Fee --}}
                            {{-- Fine --}}
                            <flux:input 
                                wire:model="fine" 
                                :label="__('දඩ')" 
                                type="text" 
                                required autofocus
                                autocomplete="fine" 
                                :placeholder="__('දඩ')" 
                                clearable
                            />
                            {{-- Fee --}}
                            <flux:input 
                                wire:model="fee" 
                                :label="__('ණය මුදල')" 
                                type="text" 
                                required autofocus
                                autocomplete="fee" 
                                :placeholder="__('ණය මුදල')" 
                                clearable
                            />
                            {{-- Interest --}}
                            <flux:input 
                                wire:model="interest" 
                                :label="__('පොළිය')" 
                                type="text" 
                                required autofocus
                                autocomplete="interest" 
                                :placeholder="__('පොළිය')" 
                                clearable
                            />
                            {{-- Installment --}}
                            <flux:input 
                                wire:model="installment" 
                                :label="__('වාරිකය')" 
                                type="text" 
                                required autofocus
                                autocomplete="installment" 
                                :placeholder="__('වාරිකය')"
                                clearable 
                            />
                            {{-- Balance --}}
                            <flux:input 
                                wire:model="balance" 
                                :label="__('ශේෂය')" 
                                type="text" 
                                required autofocus
                                autocomplete="balance" 
                                :placeholder="__('ශේෂය')" 
                                clearable
                            />
                        </div>
                    </div>
                </div>

                {{-- Fourth row --}}                
                <div class="flex gap-12 mt-12 pb-8 border-b border-neutral-700">
                    <div class="space-y-6 w-128">                        
                        <flux:heading>අමතර විස්තර</flux:heading>
                        {{-- Description --}}
                        <flux:textarea 
                            wire:model="description" 
                            :label="__('විස්තර')" 
                            resize="both"
                            :placeholder="__('විස්තර')"                             
                        />                        
                    </div>
                </div>
                
                <div class="flex items-center gap-4 mt-6">
                    <div class="flex items-center justify-end">
                        <flux:button variant="primary" type="submit" class="w-full" :loading="true">
                            {{ __('Save') }}</flux:button>
                    </div>

                    <flux:modal.close>
                        <flux:button href="#" variant="ghost" type="submit" class="w-full">{{ __('Cancel') }}
                        </flux:button>
                    </flux:modal.close>

                </div>
            </form>         
        </div>        
    </div>

    


</x-layouts.app>
