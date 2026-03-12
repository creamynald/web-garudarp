<?php

namespace App\Filament\Resources\FiveM\Players;

use App\Filament\Resources\FiveM\Players\Pages\CreatePlayer;
use App\Filament\Resources\FiveM\Players\Pages\EditPlayer;
use App\Filament\Resources\FiveM\Players\Pages\ListPlayers;
use App\Filament\Resources\FiveM\Players\Schemas\PlayerForm;
use App\Filament\Resources\FiveM\Players\Tables\PlayersTable;
use App\Models\FiveM\Player;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Schemas\Components\Section;

class PlayerResource extends Resource
{
    protected static ?string $model = Player::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Player';

    public static function form(Schema $schema): Schema
    {
        return PlayerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PlayersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPlayers::route('/'),
            'create' => CreatePlayer::route('/create'),
            'edit' => EditPlayer::route('/{record}/edit'),
        ];
    }
}
