<?php

namespace App\Filament\Resources\FiveM\Vehicles\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\FontFamily;

class VehiclesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('plate')
                    ->label('Nomor Plat')
                    ->searchable()
                    ->copyable()
                    ->weight(FontWeight::Bold)
                    ->fontFamily(FontFamily::Mono),

                TextColumn::make('player.charinfo.firstname')
                    ->label('Pemilik')
                    ->searchable(query: function ($query, string $search) {
                        return $query->whereHas('player', function ($q) use ($search) {
                            $q->where('charinfo->firstname', 'like', "%{$search}%")
                              ->orWhere('charinfo->lastname', 'like', "%{$search}%");
                        });
                    })
                    ->formatStateUsing(fn ($record) => ($record->player->charinfo['firstname'] ?? 'Unknown') . ' ' . ($record->player->charinfo['lastname'] ?? ''))
                    ->description(fn ($record) => "CID: {$record->citizenid}"),

                TextColumn::make('vehicle')
                    ->label('Model')
                    ->badge()
                    ->color('gray')
                    ->searchable(),

                // Menggunakan SelectColumn agar admin bisa ubah status langsung dari tabel
                SelectColumn::make('state')
                    ->label('Status')
                    ->options([
                        0 => 'Keluar (Out)',
                        1 => 'Garasi (In)',
                        2 => 'Disita (Depot)',
                    ])
                    ->selectablePlaceholder(false),

                TextColumn::make('garage')
                    ->label('Lokasi')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('fuel')
                    ->label('Bensin')
                    ->numeric()
                    ->suffix('%')
                    ->color(fn ($state) => $state < 20 ? 'danger' : 'success')
                    ->sortable(),
            ])
            ->filters([
                // Tambahkan filter state jika perlu
            ]);
    }
}