<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * App\Models\Thread.
 *
 * @mixin \Eloquent
 * @property-read \App\Models\ThreadCategory $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ThreadReply[] $replies
 * @property-read \App\Models\User $user
 * @property string $body
 * @property int $category_id
 * @property \Carbon\Carbon|null $created_at
 * @property int $id
 * @property bool $is_closed
 * @property bool $is_pinned
 * @property string $slug
 * @property string $title
 * @property \Carbon\Carbon|null $updated_at
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereIsClosed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereIsPinned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereUserId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Thread[] $likers
 * @property-read \Cog\Laravel\Love\LikeCounter\Models\LikeCounter $dislikesCounter
 * @property-read bool $disliked
 * @property-read int $dislikes_count
 * @property-read bool $liked
 * @property-read int $likes_count
 * @property-read int $likes_diff_dislikes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cog\Laravel\Love\Like\Models\Like[] $likesAndDislikes
 * @property-read \Cog\Laravel\Love\LikeCounter\Models\LikeCounter $likesCounter
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread orderByDislikesCount($direction = 'desc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread orderByLikesCount($direction = 'desc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereDislikedBy($userId = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereLikedBy($userId = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread query()
 */
class Thread extends Model
{
    use HasSlug;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     */
    protected $casts = [
        'is_closed' => 'boolean',
        'is_pinned' => 'boolean',
    ];

    /**
     * @return SlugOptions
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->usingSeparator('-');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(ThreadCategory::class, 'category_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany(Reply::class, 'thread_id', 'id');
    }
}
