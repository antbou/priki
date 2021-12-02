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

    public $model;
    public $days = Practice::DAYS;


    public function update(int $days = null)
    {
        $this->days = $days;
    }

    private function days()
    {
        return Practice::getPublishedPracticesByUpdateDays($this->days);
    }

    public function render()
    {
        $method = $this->model;
        $practices =  $this->$method();
        return view('livewire.show-practice', ['practices' => $practices]);
    }
}
