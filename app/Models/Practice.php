<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Practice extends Model
{
    use HasFactory;

    const DAYS = 5;

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    public function state()
    {
        return $this->belongsTo(PublicationState::class);
    }

    public static function getPublishedPracticesByUpdateDays($days)
    {
        return PublicationState::findBySlug('PUB')->practices()->where('updated_at', '>=', Carbon::now()->subDays(intval($days)))->get();
    }
}
