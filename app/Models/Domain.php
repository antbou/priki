<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function practices()
    {
        return $this->hasMany(Practice::class);
    }

    public function getPublishedPractices()
    {
        return $this->hasMany(Practice::class)->where('publication_state_id', PublicationState::findBySlug('PUB')->id);
    }

    public static function findBySlug(string $slug): Domain
    {
        return self::where('slug', $slug)->firstOrFail();
    }
}
