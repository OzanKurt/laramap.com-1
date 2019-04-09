<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Resource.
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property string|null $header_image
 * @property string $body
 * @property string|null $url
 * @property int $is_published
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resource whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resource whereHeaderImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resource whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resource whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resource whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resource whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resource whereUrl($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resource query()
 */
class Resource extends Model
{
    //
}
