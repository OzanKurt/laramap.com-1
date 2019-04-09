<?php

namespace App\Nova;

use App\Nova\Actions\SendInformationEmail;
use App\Nova\Metrics\NewUsers;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Country;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Place;
use Laravel\Nova\Fields\Text;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
use Themsaid\CashierTool\CashierResourceTool;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\User::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'email', 'username',
    ];

    /**
     * The relationships that should be eager loaded on index queries.
     *
     * @var array
     */
    public static $with = ['threads'];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Gravatar::make('Avatar', 'email'),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Username', 'username'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:255')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:6')
                ->updateRules('nullable', 'string', 'min:6'),

            $this->addressFields(),

            Text::make('Twitter', 'twitter_link')->hideFromIndex(),
            Text::make('LinkedIn', 'linkedin_link')->hideFromIndex(),
            Text::make('GitHub', 'github_link')->hideFromIndex(),
            Text::make('Facebook', 'facebook_link')->hideFromIndex(),
            Text::make('Website', 'web_link')->hideFromIndex(),

            Text::make('Company', 'company')->hideFromIndex(),

            Markdown::make('Biography', 'biography')->hideFromIndex(),

            Boolean::make('Active', 'is_active'),
            Boolean::make('Sponsor', 'is_sponsor'),
            Boolean::make('Admin', 'is_admin'),
            Boolean::make('Is Verified', 'is_verfied')->hideWhenCreating()->hideWhenUpdating(),
            Boolean::make('Available for hire', 'is_hireable')->hideFromIndex(),

            DateTime::make('Created At')->hideFromIndex(),
            DateTime::make('Updated At')->hideFromIndex(),

            CashierResourceTool::make()->onlyOnDetail(),

            HasMany::make('Threads'),

            MorphToMany::make('Roles', 'roles', \Vyuldashev\NovaPermission\Role::class),
            MorphToMany::make('Permissions', 'permissions', \Vyuldashev\NovaPermission\Permission::class),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [
            new  NewUsers(),
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            new SendInformationEmail,
            new DownloadExcel,
        ];
    }

    /**
     * Get the address fields for the resource.
     *
     * @return \Illuminate\Http\Resources\MergeValue
     */
    protected function addressFields()
    {
        return $this->merge([
            Place::make('Address', 'address')->hideFromIndex(),
            Text::make('City', 'city')->hideFromIndex(),
            Text::make('Zip Code', 'zip')->hideFromIndex(),
            Country::make('Country', 'country')->hideFromIndex(),
        ]);
    }
}
