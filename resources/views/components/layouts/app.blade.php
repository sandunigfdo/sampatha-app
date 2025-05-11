<x-layouts.app.header :title="$title ?? null">
    <flux:main>
        <div class="mx-auto max-w-7xl">
            {{ $slot }}
        </div>
    </flux:main>
</x-layouts.app.header>
