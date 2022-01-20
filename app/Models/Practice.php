<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\PublicationState;
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
        return $this->belongsTo(PublicationState::class, 'publication_state_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class)->first();
    }

    public function opinions()
    {
        return $this->hasMany(Opinion::class);
    }

    public static function getPublishedPracticesByUpdateDays($days)
    {
        return PublicationState::findBySlug('PUB')->practices()->where('updated_at', '>=', Carbon::now()->subDays(intval($days)))->get();
    }

    public static function isPracticeIsPublished($id)
    {
        return self::where('id', $id)->where('publication_state_id', PublicationState::findBySlug('PUB')->id);
    }

    public static function getAllPublishedPractices()
    {
        return self::all()->where('publication_state_id', PublicationState::findBySlug('PUB')->id);
    }
}
