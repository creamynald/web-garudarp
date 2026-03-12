<div wire:poll.30s class="p-6 bg-gray-950 h-screen text-white flex gap-6 overflow-hidden">

    <div class="w-1/4 bg-gray-900 rounded-2xl border border-gray-800 flex flex-col shadow-2xl overflow-hidden">
        <div class="p-4 border-b border-gray-800 bg-gray-900/50 backdrop-blur-md">
            <h1 class="text-xl font-extrabold tracking-tighter mb-1 italic text-red-500">GARUDARP <span class="text-white text-sm not-italic opacity-50">RADAR</span></h1>
            <div class="flex items-center gap-2 mb-4">
                <span class="animate-pulse flex h-2 w-2 rounded-full bg-red-500"></span>
                <p class="text-[10px] text-gray-500 uppercase tracking-widest font-bold">{{ $onlineCount }} Online</p>
            </div>
            
            <input wire:model.live.debounce.300ms="search" 
                   type="text" 
                   placeholder="Cari Nama / CID..." 
                   class="w-full bg-gray-800 text-sm px-4 py-2 rounded-lg border border-gray-700 focus:ring-2 focus:ring-red-500 outline-none transition-all placeholder:text-gray-600">
        </div>

        <div class="flex-1 overflow-y-auto p-2 space-y-4 custom-scrollbar">
            @php
                $males = $players->filter(fn($p) => ($p->charinfo['gender'] ?? 0) == 0);
                $females = $players->filter(fn($p) => ($p->charinfo['gender'] ?? 0) == 1);
            @endphp

            <div>
                <div class="flex items-center gap-2 px-3 mb-2 opacity-50">
                    <span class="text-[10px] font-black uppercase tracking-widest text-blue-400">♂ Laki-Laki</span>
                    <div class="h-[1px] flex-1 bg-blue-500/30"></div>
                </div>
                @foreach($males as $player)
                    <div class="flex items-center gap-3 p-3 bg-gray-800/50 rounded-lg border border-gray-700/50 hover:bg-gray-800 transition cursor-pointer group mb-1">
                        <div class="relative flex h-3 w-3">
                            @if($player->is_active)
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                            @else
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-gray-600"></span>
                            @endif
                        </div>
                        <div class="flex-1">
                            <p class="text-xs font-bold group-hover:text-blue-400 transition-colors">{{ $player->charinfo['firstname'] ?? 'Unknown' }} {{ $player->charinfo['lastname'] ?? '' }}</p>
                            <p class="text-[9px] text-gray-500 uppercase">{{ $player->citizenid }}</p>
                        </div>
                        <span class="text-[10px] text-blue-400 opacity-40 italic">♂</span>
                    </div>
                @endforeach
            </div>

            @if($females->count() > 0)
            <div>
                <div class="flex items-center gap-2 px-3 mb-2 opacity-50">
                    <span class="text-[10px] font-black uppercase tracking-widest text-pink-400">♀ Perempuan</span>
                    <div class="h-[1px] flex-1 bg-pink-500/30"></div>
                </div>
                @foreach($females as $player)
                    <div class="flex items-center gap-3 p-3 bg-gray-800/50 rounded-lg border border-gray-700/50 hover:bg-gray-800 transition cursor-pointer group mb-1">
                        <div class="relative flex h-3 w-3">
                            @if($player->is_active)
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                            @else
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-gray-600"></span>
                            @endif
                        </div>
                        <div class="flex-1">
                            <p class="text-xs font-bold group-hover:text-pink-400 transition-colors">{{ $player->charinfo['firstname'] ?? 'Unknown' }} {{ $player->charinfo['lastname'] ?? '' }}</p>
                            <p class="text-[9px] text-gray-500 uppercase">{{ $player->citizenid }}</p>
                        </div>
                        <span class="text-[10px] text-pink-400 opacity-40 italic">♀</span>
                    </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>

    <div class="flex-1 bg-gray-900 rounded-2xl border border-gray-800 p-2 flex flex-col shadow-2xl overflow-hidden relative">
        
        <div class="flex-1 overflow-auto rounded-xl bg-black custom-scrollbar relative border border-gray-800 shadow-inner">
            
            <div class="relative" 
                 style="width: 3000px; height: 3000px; background: url('{{ asset('storage/images/map-fivem.jpg') }}') center/cover no-repeat;">
                
                @foreach($players as $player)
                    @php
                        $x = $player->position['x'] ?? 0;
                        $y = $player->position['y'] ?? 0;
                        $gender = $player->charinfo['gender'] ?? 0;

                        $left = (($x + 4000) / 12000) * 100;
                        $top = (1 - ($y + 4000) / 12000) * 100;

                        $markerColor = $player->is_active 
                            ? ($gender == 0 ? 'bg-blue-500 shadow-[0_0_15px_rgba(59,130,246,0.8)]' : 'bg-pink-500 shadow-[0_0_15px_rgba(236,72,153,0.8)]')
                            : 'bg-gray-600';
                    @endphp

                    <div class="absolute group/pin" 
                         style="left: {{ $left }}%; top: {{ $top }}%; transform: translate(-50%, -50%); z-index: {{ $player->is_active ? 20 : 10 }}; transition: all 2s ease-in-out;">
                        
                        <div class="w-5 h-5 {{ $markerColor }} border-2 border-white/20 rounded-full flex items-center justify-center text-[10px] font-bold shadow-lg transition-all duration-300 group-hover/pin:scale-150">
                             {{ $gender == 0 ? '♂' : '♀' }}
                        </div>

                        <div class="hidden group-hover/pin:block absolute bottom-full mb-3 left-1/2 -translate-x-1/2 z-50">
                            <div class="bg-gray-900/95 backdrop-blur-md text-white text-[10px] px-3 py-2 rounded-xl border border-gray-700 shadow-2xl min-w-[120px]">
                                <p class="font-black text-xs">{{ $player->charinfo['firstname'] }} {{ $player->charinfo['lastname'] }}</p>
                                <p class="text-gray-500 uppercase text-[8px] font-mono tracking-tighter">{{ $player->citizenid }}</p>
                                <div class="flex items-center gap-2 mt-1 border-t border-gray-800 pt-1">
                                    <span class="{{ $gender == 0 ? 'text-blue-400' : 'text-pink-400' }}">{{ $gender == 0 ? '♂ Laki-Laki' : '♀ Perempuan' }}</span>
                                </div>
                            </div>
                            <div class="w-3 h-3 bg-gray-900 border-r border-b border-gray-700 rotate-45 mx-auto -mt-1.5"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        <div class="absolute bottom-6 right-8 bg-gray-900/80 backdrop-blur-md p-3 rounded-lg border border-gray-700 text-[9px] flex gap-4 pointer-events-none">
            <div class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-blue-500"></span> ♂ Laki-laki</div>
            <div class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-pink-500"></span> ♀ Perempuan</div>
            <div class="flex items-center gap-1 italic text-gray-400 underline underline-offset-4 decoration-red-500/50">Gunakan scroll mouse untuk keliling peta</div>
        </div>
    </div>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar { width: 4px; height: 4px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #374151; border-radius: 10px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #ef4444; }
</style>