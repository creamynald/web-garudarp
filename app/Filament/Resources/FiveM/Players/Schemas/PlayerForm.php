<?php

namespace App\Filament\Resources\FiveM\Players\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\TextSize;
use Filament\Support\Enums\FontFamily;

class PlayerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // ─────────────────────────────────────────
                // BAGIAN ATAS: Grid Profil, Status, Lokasi
                // ─────────────────────────────────────────
                Grid::make(3)
                    ->schema([
                        // KOLOM KIRI (2/3): Identitas & Ekonomi
                        Group::make()
                            ->columnSpan(2)
                            ->schema([
                                Section::make('Informasi Karakter')
                                    ->icon('heroicon-o-user')
                                    ->columns(2)
                                    ->schema([
                                        TextEntry::make('charinfo.firstname')
                                            ->label('Nama Karakter')
                                            ->size(TextSize::Large)
                                            ->weight(FontWeight::Bold)
                                            ->formatStateUsing(fn ($record) => 
                                                "{$record->charinfo['firstname']} {$record->charinfo['lastname']}"
                                            )
                                            ->helperText(fn($record) => "Citizen ID: {$record->citizenid}")
                                            ->copyable()
                                            ->columnSpanFull(),

                                        TextEntry::make('charinfo.phone')
                                            ->label('Nomor Telepon')
                                            ->icon('heroicon-m-phone')
                                            ->copyable()
                                            ->fontFamily(FontFamily::Mono),

                                        TextEntry::make('charinfo.gender')
                                            ->label('Gender')
                                            ->formatStateUsing(fn ($state) => $state == 0 ? 'Laki-laki' : 'Perempuan')
                                            ->badge()
                                            ->color('gray'),

                                        TextEntry::make('charinfo.birthdate')
                                            ->label('Tanggal Lahir')
                                            ->date('d F Y'),

                                        TextEntry::make('job.label')
                                            ->label('Pekerjaan')
                                            ->badge()
                                            ->color('success')
                                            ->helperText(fn($record) => "Grade: " . ($record->job['grade']['name'] ?? 'Survivor')),

                                        TextEntry::make('gang.label')
                                            ->label('Gang')
                                            ->badge()
                                            ->color('danger')
                                            ->helperText(fn($record) => "Rank: " . ($record->gang['grade']['name'] ?? 'None')),
                                    ]),

                                Section::make('Keuangan & Legalitas')
                                    ->icon('heroicon-o-currency-dollar')
                                    ->columns(2)
                                    ->schema([
                                        TextEntry::make('money.cash')
                                            ->label('Uang Tunai')
                                            ->money('USD')
                                            ->color('success')
                                            ->weight(FontWeight::ExtraBold)
                                            ->size(TextSize::Large),

                                        TextEntry::make('money.bank')
                                            ->label('Saldo Bank')
                                            ->money('USD')
                                            ->color('info')
                                            ->weight(FontWeight::ExtraBold)
                                            ->size(TextSize::Large),

                                        TextEntry::make('metadata.licences')
                                            ->label('Lisensi Aktif')
                                            ->columnSpanFull()
                                            ->formatStateUsing(function ($state) {
                                                $licenses = [];
                                                if (!empty($state['id'])) $licenses[] = 'KTP';
                                                if (!empty($state['driver'])) $licenses[] = 'SIM';
                                                if (!empty($state['weapon'])) $licenses[] = 'Senjata';
                                                return implode(', ', $licenses) ?: 'Tidak ada lisensi';
                                            })
                                            ->badge()
                                            ->color('gray')
                                            ->icon('heroicon-o-check-badge'),
                                    ]),
                            ]),

                        // KOLOM KANAN (1/3): Vitalitas & Lokasi
                        Group::make()
                            ->columnSpan(1)
                            ->schema([
                                Section::make('Status Vital')
                                    ->icon('heroicon-o-heart')
                                    ->schema([
                                        TextEntry::make('metadata.health')
                                            ->label('Kesehatan')
                                            ->formatStateUsing(fn ($state) => max(0, $state - 100) . '%')
                                            ->badge()
                                            ->color(fn ($state) => match (true) {
                                                $state > 180 => 'success',
                                                $state > 140 => 'warning',
                                                default => 'danger',
                                            })
                                            ->icon('heroicon-o-heart')
                                            ->iconColor(fn ($state) => match (true) {
                                                $state > 180 => 'success',
                                                $state > 140 => 'warning',
                                                default => 'danger',
                                            }),

                                        TextEntry::make('metadata.hunger')
                                            ->label('Kelaparan')
                                            ->formatStateUsing(fn ($state) => round($state) . '%')
                                            ->badge()
                                            ->color('orange')
                                            ->icon('heroicon-o-fire'),

                                        TextEntry::make('metadata.thirst')
                                            ->label('Kehausan')
                                            ->formatStateUsing(fn ($state) => round($state) . '%')
                                            ->badge()
                                            ->color('blue')
                                            ->icon('heroicon-o-beaker'), // ✅ GANTI: beaker lebih aman
                                    ]),

                                Section::make('Lokasi Terakhir')
    ->icon('heroicon-o-map')
    ->schema([
        // UBAH NAMA KEY menjadi 'posisi_karakter' agar Filament tidak mendeteksinya sebagai array bawaan
        TextEntry::make('posisi_karakter') 
            ->label('Koordinat XYZ & Heading')
            ->html() 
            ->state(function ($record) {
                // Ambil data langsung dari record untuk merender 1 kali saja
                $x = round($record->position['x'] ?? 0, 2);
                $y = round($record->position['y'] ?? 0, 2);
                $z = round($record->position['z'] ?? 0, 2);
                // Menambahkan 'W' (Heading)
                $w = round($record->position['w'] ?? 0, 2); 

                return <<<HTML
                    <div class="flex items-center gap-3 font-mono mt-1">
                        <span class="px-2.5 py-1 rounded-md bg-red-500/10 text-red-600 dark:text-red-400 border border-red-500/20 shadow-sm">
                            <strong class="text-red-700 dark:text-red-300">X:</strong> {$x}
                        </span>
                        <span class="px-2.5 py-1 rounded-md bg-green-500/10 text-green-600 dark:text-green-400 border border-green-500/20 shadow-sm">
                            <strong class="text-green-700 dark:text-green-300">Y:</strong> {$y}
                        </span>
                        <span class="px-2.5 py-1 rounded-md bg-blue-500/10 text-blue-600 dark:text-blue-400 border border-blue-500/20 shadow-sm">
                            <strong class="text-blue-700 dark:text-blue-300">Z:</strong> {$z}
                        </span>
                        <span class="px-2.5 py-1 rounded-md bg-gray-500/10 text-gray-600 dark:text-gray-400 border border-gray-500/20 shadow-sm" title="Arah Hadap (Heading)">
                            <strong class="text-gray-700 dark:text-gray-300">W:</strong> {$w}°
                        </span>
                    </div>
                HTML;
            })
            ->copyable()
            ->copyMessage('Command Teleport disalin!')
            ->copyableState(function ($record) {
                $x = round($record->position['x'] ?? 0, 2);
                $y = round($record->position['y'] ?? 0, 2);
                $z = round($record->position['z'] ?? 0, 2);
                
                // Biasanya command teleport FiveM tidak membutuhkan 'w'
                return "/tppos {$x} {$y} {$z}";
            })
            ->columnSpanFull(),
    ]),
                            ]),
                    ]),

                // ─────────────────────────────────────────
                // BAGIAN TENGAH: Garasi Kendaraan
                // ─────────────────────────────────────────
                Section::make('Isi Tas (Inventory)')
                    ->icon('heroicon-o-shopping-bag')
                    ->schema([
                        ViewEntry::make('inventory')
                            ->label('')
                            ->view('filament.infolists.components.inventory-grid')
                            ->columnSpanFull(),
                    ]),
                Section::make('Garasi Kendaraan')
                    ->icon('heroicon-o-truck')
                    ->schema([
                        RepeatableEntry::make('vehicles')
                            ->label('')
                            ->grid(4)
                            ->schema([
                                TextEntry::make('vehicle')
                                    ->label('')
                                    ->weight(FontWeight::Bold)
                                    ->icon('heroicon-m-chevron-right')
                                    ->formatStateUsing(fn ($state) => strtoupper($state))
                                    ->helperText(fn ($record) => "Plat: " . $record->plate),
                            ])
                            ->columnSpanFull()
                            ->placeholder('🚗 Pemain belum memiliki kendaraan'),
                    ]),

                // ─────────────────────────────────────────
                // BAGIAN BAWAH: Inventory (Custom View)
                // ─────────────────────────────────────────
                
            ]);
    }
}