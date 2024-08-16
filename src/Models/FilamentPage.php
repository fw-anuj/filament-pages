<?php

namespace Beier\FilamentPages\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * @property string $slug
 * @property string $title
 * @property array{content: array, template: string, templateName: string} data
 * @property \Carbon\CarbonImmutable $published_at
 * @property \Carbon\CarbonImmutable $published_until
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class FilamentPage extends Model
{
    use HasTranslations;
    protected $guarded = [];

    public $translatable = ['title', 'data'];
    
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected $casts = [
        'blocks' => 'json',
        'data' => 'json',
        'published_at' => 'immutable_datetime',
        'published_until' => 'immutable_datetime',
    ];
}
