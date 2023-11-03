<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Project extends Model implements Sortable
{
    use HasFactory;
    use SoftDeletes;
    use HasSlug;
    use SortableTrait;

    protected $casts = [
        'published_at' => 'date',
        'highlights' => 'array',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function buildSortQuery(): Builder
    {
        return static::query()
            ->where('company_id', $this->company_id);
    }
}
