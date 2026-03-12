@php
    $record = $getRecord();
    $items = $record->inventory ?? [];
@endphp

@if(count($items) > 0)
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(120px, 1fr)); gap: 12px;">
        @foreach($items as $item)
            @php
                $itemName = strtoupper(str_replace('_', ' ', $item['name'] ?? 'unknown'));
                $itemCount = $item['count'] ?? 1;
                $imageUrl = asset("storage/items/{$item['name']}.png");
                $fallbackImage = asset('storage/items/default.png');
            @endphp

            <div style="
                background: white;
                border: 1px solid #e5e7eb;
                border-radius: 8px;
                padding: 12px;
                text-align: center;
                aspect-ratio: 1;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: space-between;
            ">
                <div style="font-size: 9px; font-weight: bold; text-transform: uppercase; line-height: 1.2; height: 32px; display: flex; align-items: center;">
                    {{ $itemName }}
                </div>
                
                <div style="flex-grow: 1; display: flex; align-items: center; justify-content: center;">
                    <img src="{{ $imageUrl }}" 
                         alt="{{ $itemName }}"
                         style="max-width: 100%; max-height: 48px; object-fit: contain;"
                         onerror="this.src='{{ $fallbackImage }}';" />
                </div>
                
                <div style="
                    background: #f3f4f6;
                    padding: 4px 8px;
                    border-radius: 4px;
                    font-size: 11px;
                    font-weight: bold;
                ">
                    x{{ $itemCount }}
                </div>
            </div>
        @endforeach
    </div>
@else
    <div style="
        text-align: center;
        padding: 48px;
        color: #6b7280;
        background: #f9fafb;
        border: 2px dashed #e5e7eb;
        border-radius: 8px;
    ">
        🎒 Tas pemain kosong
    </div>
@endif