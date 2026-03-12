<?php

namespace App\Filament\Resources\FiveM\Vehicles;

use App\Filament\Resources\FiveM\Vehicles\Pages\CreateVehicle;
use App\Filament\Resources\FiveM\Vehicles\Pages\EditVehicle;
use App\Filament\Resources\FiveM\Vehicles\Pages\ListVehicles;
use App\Filament\Resources\FiveM\Vehicles\Schemas\VehicleForm;
use App\Filament\Resources\FiveM\Vehicles\Tables\VehiclesTable;
use App\Models\FiveM\PlayerVehicle as Vehicle;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VehicleResource extends Resource
{
    protected static ?string $model = Vehicle::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Vehicle';

    public static function form(Schema $schema): Schema
    {
        return VehicleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VehiclesTable::configure($table);
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
            'index' => ListVehicles::route('/'),
            'create' => CreateVehicle::route('/create'),
            'edit' => EditVehicle::route('/{record}/edit'),
        ];
    }
}
