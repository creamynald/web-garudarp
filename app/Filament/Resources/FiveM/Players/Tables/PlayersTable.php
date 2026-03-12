<?php

namespace App\Filament\Resources\FiveM\Players\Tables;

use Illuminate\Database\Eloquent\Builder;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class PlayersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('citizenid')
                    ->label('CID')
                    ->copyable()
                    ->searchable()
                    ->sortable()
                    ->description(fn ($record) => $record->license),

                TextColumn::make('name')
                    ->label('Passport')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('charinfo.firstname')
                    ->label('Nama IC')
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query
                            ->where('charinfo->firstname', 'like', "%{$search}%")
                            ->orWhere('charinfo->lastname', 'like', "%{$search}%")
                            ->orWhere('charinfo->cid', 'like', "%{$search}%"); // Bonus: cari berdasarkan CID juga
                    })
                    ->formatStateUsing(function ($record) {
                        // Mengambil data dari array charinfo
                        $first = $record->charinfo['firstname'] ?? '';
                        $last = $record->charinfo['lastname'] ?? '';
                        return "{$first} {$last}";
                    })
                    ->sortable(query: function (Builder $query, string $direction): Builder {
                        // Karena data di dalam JSON, kita perlu sort manual ke kolom tersebut
                        return $query->orderBy('charinfo->firstname', $direction);
                    }),

                TextColumn::make('metadata.health')
                    ->label('Health')
                    ->state(function ($record) {
                        $health = $record->metadata['health'] ?? 100;
                        
                        $percentage = (($health - 100) / 100) * 100;
                        
                        return number_format(max(0, $percentage), 0);
                    })
                    ->suffix('%')
                    ->badge()
                    ->color(fn ($state): string => match (true) {
                        $state <= 25 => 'danger',  
                        $state <= 50 => 'warning', 
                        default => 'success',      
                    })
                    ->sortable(),

                TextColumn::make('metadata.hunger')
                    ->label('Lapar')
                    ->numeric(decimalPlaces: 0) 
                    ->suffix('%')
                    ->color('warning'),

                TextColumn::make('vehicles_count')
                    ->label('Kendaraan')
                    ->counts('vehicles')
                    ->tooltip('Jumlah total kendaraan yang dimiliki di garasi')
                    ->badge(),

                TextColumn::make('last_updated')
                    ->label('Terakhir Online')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('last_updated', 'desc')
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
