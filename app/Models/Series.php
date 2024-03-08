<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Series extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'cover'];
    protected $casts = [
        'watched' => 'boolean'
    ];

    public function seasons()
    {
        return $this->hasMany(Season::class, 'series_id');
    }

    public function episodes()
    {
        return $this->hasManyThrough(Episode::class, Season::class);
    }

    protected static function booted()
    {
        self::addGlobalScope('ordered', function (Builder $queryBuilder) {
            $queryBuilder->orderBy('nome');
        });
    }

    // protected function watched() : Attribute
    // {
    //     return new Attribute(
    //        get: fn($watched)=>(bool) $watched,
    //     );
    // }
}
