<?php

namespace App\Filament\Resources\FiveM\Vehicles\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use App\Models\FiveM\Player;
use Filament\Schemas\Components\Utilities\Set;

class VehicleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Pemberian Kendaraan Baru (Give Car)')
                    ->icon('heroicon-o-plus-circle')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                // 1. Pilih Player
                                Select::make('citizenid')
                                    ->label('Penerima (Player)')
                                    ->relationship('player', 'citizenid')
                                    ->getOptionLabelFromRecordUsing(fn (Player $record) => "{$record->charinfo['firstname']} {$record->charinfo['lastname']} ({$record->citizenid})")
                                    // Tambahkan ini agar bisa mencari berdasarkan Nama IC atau CitizenID
                                    ->getSearchResultsUsing(function (string $search): array {
                                        return \App\Models\FiveM\Player::query()
                                            ->where('charinfo->firstname', 'like', "%{$search}%")
                                            ->orWhere('charinfo->lastname', 'like', "%{$search}%")
                                            ->orWhere('citizenid', 'like', "%{$search}%")
                                            ->limit(10)
                                            ->get()
                                            ->mapWithKeys(function ($player) {
                                                // Format tampilan di hasil pencarian
                                                $name = "{$player->charinfo['firstname']} {$player->charinfo['lastname']} ({$player->citizenid})";
                                                return [$player->citizenid => $name];
                                            })
                                            ->toArray();
                                    })
                                    ->searchable()
                                    ->required()
                                    ->live()
                                    ->afterStateUpdated(function (\Filament\Schemas\Components\Utilities\Set $set, $state) {
                                        $player = \App\Models\FiveM\Player::where('citizenid', $state)->first();
                                        if ($player) {
                                            $set('license', $player->license);
                                        }
                                    }),

                                Hidden::make('license'),

                                // 2. Model Kendaraan
                                TextInput::make('vehicle')
                                    ->label('Model Kendaraan (Spawn Name)')
                                    ->required()
                                    ->live()
                                    ->afterStateUpdated(fn (Set $set, $state) => $set('hash', \App\Models\FiveM\PlayerVehicle::generateJoaatHash($state))),

                                Hidden::make('hash'),

                                // 3. Nomor Plat
                                TextInput::make('plate')
                                    ->label('Nomor Plat')
                                    ->default(fn () => 'GRD' . rand(1000, 9999)) 
                                    ->maxLength(8)
                                    ->required()
                                    ->unique(ignoreRecord: true),

                                // 4. Garasi
                                Select::make('garage_id') // Gunakan garage_id sesuai struktur tabel Anda
                                    ->label('Lokasi Garasi')
                                    ->options([
                                        'BunkerA' => 'Bunker A',
                                    ])
                                    ->default('BunkerA')
                                    ->required(),

                                // 5. Status
                                Select::make('state')
                                    ->label('Status Kendaraan')
                                    ->options([
                                        0 => 'Keluar (Out)',
                                        1 => 'Di Dalam Garasi (In)',
                                        2 => 'Disita (Depot)',
                                    ])
                                    ->default(1)
                                    ->required(),
                            ]),
                    ]),

                // KOLOM WAJIB TANPA DEFAULT DI DATABASE (DISEMBUNYIKAN)
                Section::make('System Data')
                    ->hidden()
                    ->schema([
                        TextInput::make('mods')->default('[]'),
                        TextInput::make('damage')->default('[]'),
                        TextInput::make('glovebox')->default('[]'),
                        TextInput::make('trunk')->default('[]'),
                        TextInput::make('mileage')->default(0),
                        TextInput::make('balance')->default(0),
                        TextInput::make('paymentamount')->default(0),
                        TextInput::make('paymentsleft')->default(0),
                        TextInput::make('financetime')->default(0),
                        TextInput::make('depotprice')->default(0),
                        TextInput::make('parking')->default(null),
                        TextInput::make('impound_data')->default('[]'),
                        TextInput::make('impound')->default(0),
                        TextInput::make('impound_retrievable')->default(0),
                    ]),

                Section::make('Kondisi Mesin & Bahan Bakar')
                    ->collapsed()
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('fuel')->label('Bensin (%)')->numeric()->default(100)->suffix('%'),
                                TextInput::make('engine')->label('Kondisi Mesin')->numeric()->default(1000),
                                TextInput::make('body')->label('Kondisi Body')->numeric()->default(1000),
                            ]),
                    ]),
            ]);
    }
}