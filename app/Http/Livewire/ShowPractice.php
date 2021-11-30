<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Practice;
use App\Models\PublicationState;

class ShowPractice extends Component
{

    public $days = Practice::DAYS;

    public function updateDays(int $days)
    {
        $this->days = $days;
    }

    public function render()
    {
        $practices = PublicationState::where('slug', 'PUB')->first()->practices()->where('updated_at', '>=', Carbon::now()->subDays(intval($this->days)))->get();
        return view('livewire.show-practice', ['practices' => $practices]);
    }
}
