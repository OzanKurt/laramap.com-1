<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * App\Models\ThreadCategory.
 *
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Thread[] $threads
 * @property \Carbon\Carbon|null $created_at
 * @property string|null $description
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ThreadCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ThreadCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ThreadCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ThreadCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ThreadCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ThreadCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ThreadCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ThreadCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ThreadCategory query()
 */
class ThreadCategory extends Model
{
    use HasSlug;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return SlugOptions
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function threads()
    {
        return $this->hasMany(Thread::class, 'category_id', 'id');
    }
}
