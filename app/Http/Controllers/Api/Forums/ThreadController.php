<?php

namespace App\Http\Controllers\Api\Forums;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forums\ThreadCreateRequest;
use App\Http\Requests\Forums\ThreadUpdateRequest;
use App\Http\Resources\ThreadResource;
use App\Models\Thread;
use App\Models\User;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->query->has('category_id')) {
            $threads = Thread::whereCategoryId(request()->query('category_id'))->get();
        } else {
            $threads = Thread::all();
        }

        return ThreadResource::collection($threads);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ThreadCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThreadCreateRequest $request)
    {
        $thread = Thread::create($request->validated());

        $user = User::find($request->get('user_id'));

        activity()
            ->causedBy($user)
            ->performedOn($thread)
            ->withProperties(['title' => $thread->title])
            ->log('created a new thread ":properties.title".');

        return ThreadResource::make($thread);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thread = Thread::find($id);

        return ThreadResource::make($thread);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ThreadUpdateRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ThreadUpdateRequest $request, $id)
    {
        $thread = Thread::find($id)
            ->update($request->validated());

        return ThreadResource::make($thread);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thread = Thread::find($id)
           ->forceDelete();

        return $this->index();
    }
}
