<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\View\View
     */
    public function getResults(Request $request)
    {
        $users = User::search($request->get('query'))->get();

        if ($request->wantsJson()) {
            return UserResource::collection($users);
        }

        return view('search.results', compact('users'));
    }
}
