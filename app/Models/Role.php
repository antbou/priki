<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static function roleMember()
    {
        return self::findBySlug('MBR');
    }

    public static function findBySlug(string $slug): Role
    {
        return self::where('slug', $slug)->first();
    }
}
