<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Practice;
use App\Models\PublicationState;
use Illuminate\Database\Eloquent\Collection;
use PhpParser\Node\Expr\Print_;

class ShowPractice extends Component
{
    public $days = Practice::DAYS;

    public function update(int $days = null)
    {
        $this->days = $days;
    }

    public function render()
    {
        $practices =  Practice::publishedPracticesByUpdateDays($this->days);
        return view('livewire.show-practice', ['practices' => $practices]);
    }
}
