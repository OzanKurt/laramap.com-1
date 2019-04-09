<?php

namespace App\Models;

use App\Notifications\Admin\NotifyAboutNewUserNotification;
use App\Notifications\Users\WelcomeNotification;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Laravel\Scout\Searchable;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\User.
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $city
 * @property string|null $zip
 * @property string|null $country
 * @property string|null $avatar_path
 * @property string|null $biography
 * @property bool $is_active
 * @property int $is_sponsor
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereAvatarPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereBiography($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereIsSponsor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereZip($value)
 * @mixin \Eloquent
 * @property string|null $provider
 * @property string|null $provider_id
 * @property string|null $access_token
 * @property string|null $address
 * @property string|null $twitter_link
 * @property string|null $linkedin_link
 * @property string|null $github_link
 * @property string|null $facebook_link
 * @property string|null $web_link
 * @property-read string $gravatar
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereFacebookLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereGithubLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLinkedinLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereTwitterLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereWebLink($value)
 * @property string|null $company
 * @property bool $is_admin
 * @property bool $is_hireable
 * @property-read null|string $avatar
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereIsHireable($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $blockers
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $blocking
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $followers
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $following
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $liking
 * @property-read \Illuminate\Support\Collection $activities
 * @property string|null $confirmation_code
 * @property string|null $confirmed_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereConfirmationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereConfirmedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ThreadReply[] $threadReplies
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Thread[] $threads
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User role($roles)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Reply[] $replies
 * @property string|null $stripe_id
 * @property string|null $card_brand
 * @property string|null $card_last_four
 * @property string|null $trial_ends_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCardBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCardLastFour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereTrialEndsAt($value)
 * @property string|null $email_verified_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 */
class User extends Authenticatable implements MustVerifyEmailContract
{
    use HasApiTokens, Notifiable, Searchable, HasRoles, MustVerifyEmail;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'is_admin' => 'boolean',
        'is_active' => 'boolean',
        'is_hireable' => 'boolean',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'email_verified_at',
    ];

    /***
     * @var array
     */
    protected $appends = [
        'gravatar', 'avatar', 'activities',
    ];

    /**
     * Boot method of the model.
     */
    public static function boot()
    {
        parent::boot();
        self::created(function (User $user) {
            self::admins()->each->notify(new NotifyAboutNewUserNotification($user));

            $user->notify(new WelcomeNotification($user));
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function admins()
    {
        return static::where('is_admin', true)->get();
    }

    /**
     * @return null|string
     */
    public function getAvatarAttribute()
    {
        if ($this->avatar_path) {
            return $this->avatar_path;
        } else {
            return $this->getGravatarAttribute();
        }
    }

    /**
     * @return string
     */
    public function getGravatarAttribute()
    {
        $params = [
            's' => 80,
            'd' => 'mp',
            'r' => 'g',
        ];

        $url = 'https://www.gravatar.com/avatar/'.md5(strtolower(trim($this->email)));

        $query = http_build_query($params);

        return "$url?$query";
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getActivitiesAttribute()
    {
        return Activity::where('causer_id', $this->id)->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function threads()
    {
        return $this->hasMany(Thread::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany(Reply::class, 'user_id', 'id');
    }
}
