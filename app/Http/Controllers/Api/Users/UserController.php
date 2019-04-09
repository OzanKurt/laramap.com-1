<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return UserResource::collection($users);
    }

    /**
     * Display a listing of the users by country.
     *
     * @param string $country
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function indexByCountry(string $country)
    {
        $users = User::where('country', $country)->get();

        return UserResource::collection($users);
    }

    /**
     * Display a listing of the users by city.
     *
     * @param string $country
     * @param string $city
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function indexByCity(string $country, string $city)
    {
        $users = User::where('country', $country)
            ->where('city', $city)
            ->get();

        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return UserResource::make($user);
    }

    /**4
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $user = (new \App\Models\User)->find($id);
        $user->update($request->validated());

        return UserResource::make($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display a listing of users countries with users count.
     *
     * @return array
     */
    public function countries()
    {
        $countries = DB::table('users')
            ->select(DB::raw('country as name, count(*) as users_count'))
            ->where('country', '<>', '')
            ->groupBy('country')
            ->orderBy('country')
            ->get();

        $result = [];
        foreach ($countries as $country) {
            $result[] = ['name' => $country->name, 'users_count' => $country->users_count];
        }

        return ['data' => $result];
    }

    /**
     * Display a listing of users cities with users count.
     *
     * @param string $country
     * @return array
     */
    public function cities(string $country)
    {
        $cities = DB::table('users')
            ->select(DB::raw('city as name, count(*) as users_count'))
            ->where('country', $country)
            ->where('city', '<>', '')
            ->groupBy('city')
            ->orderBy('city')
            ->get();

        $result = [];
        foreach ($cities as $city) {
            $result[] = ['name' => $city->name, 'users_count' => $city->users_count];
        }

        return ['data' => $result];
    }
}
