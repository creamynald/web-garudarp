<?php

namespace App\Filament\Resources\FiveM\Players\Pages;

use App\Filament\Resources\FiveM\Players\PlayerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class EditPlayer extends EditRecord
{
    protected static string $resource = PlayerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // DeleteAction::make(),
            Action::make('clear_inventory')
                ->label('Kosongkan Tas')
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->requiresConfirmation() // Munculkan pop-up konfirmasi
                ->modalHeading('Hapus Semua Item?')
                ->modalDescription('Tindakan ini akan menghapus seluruh isi tas pemain. Pastikan pemain sedang tidak online!')
                ->action(function ($record) {
                    // Update kolom inventory menjadi array kosong
                    $record->update([
                        'inventory' => []
                    ]);

                    Notification::make()
                        ->title('Inventory Berhasil Dihapus')
                        ->success()
                        ->send();
                }),
        ];
    }
}
