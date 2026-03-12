<?php

namespace App\Livewire\FiveM;

use App\Models\FiveM\Player;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;

#[Title('GarudaRP Live Tracker')]
class PlayerTracker extends Component
{
    #[Url(as: 'q')]
    public $search = '';

    public function render()
    {
        $allPlayers = Player::query()
            ->online()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('charinfo->firstname', 'like', '%' . $this->search . '%')
                    ->orWhere('charinfo->lastname', 'like', '%' . $this->search . '%')
                    ->orWhere('citizenid', 'like', '%' . $this->search . '%');
                });
            })
            ->orderByDesc('last_updated')
            ->get();

        return view('livewire.five-m.player-tracker', [
            'players' => $allPlayers,
            'onlineCount' => $allPlayers->count(),
        ])->layout('layouts.app');
    }
}