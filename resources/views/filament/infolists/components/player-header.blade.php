@props(['record', 'avatar' => null])

<div class="flex items-center gap-4 p-4 bg-gradient-to-r from-primary-50 to-white dark:from-gray-800 dark:to-gray-900 rounded-t-xl border-b dark:border-gray-700">
    {{-- Avatar / Placeholder --}}
    <div class="relative">
        <div class="w-16 h-16 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center overflow-hidden border-2 border-white dark:border-gray-600 shadow">
            @if($avatar)
                <img src="{{ $avatar }}" alt="Avatar" class="w-full h-full object-cover" onerror="this.parentElement.innerHTML='<x-heroicon-o-user-circle class=\'w-8 h-8 text-gray-400\'/>'" />
            @else
                <x-heroicon-o-user-circle class="w-8 h-8 text-gray-400" />
            @endif
        </div>
        {{-- Status Online Indicator --}}
        @if($record->is_online ?? false)
            <span class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-success-500 border-2 border-white dark:border-gray-900 rounded-full" title="Online"></span>
        @endif
    </div>

    {{-- Info Singkat --}}
    <div class="flex-1 min-w-0">
        <h3 class="font-bold text-lg text-gray-900 dark:text-white truncate">
            {{ $record->charinfo['firstname'] ?? 'Unknown' }} {{ $record->charinfo['lastname'] ?? '' }}
        </h3>
        <p class="text-sm text-gray-500 dark:text-gray-400 truncate">
            @if($record->job['label'] ?? null)
                🎯 {{ $record->job['label'] }} • 
            @endif
            @if($record->gang['label'] ?? null)
                🔥 {{ $record->gang['label'] }}
            @endif
        </p>
    </div>
</div>