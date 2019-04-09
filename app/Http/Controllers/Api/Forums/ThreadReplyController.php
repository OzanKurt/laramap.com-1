<?php

namespace App\Http\Controllers\Api\Forums;

use App\Http\Controllers\Controller;
use App\Http\Resources\ThreadReplyResource;
use App\Models\Thread;
use App\Models\User;
use App\Notifications\Forums\NewCommentNotification;
use Illuminate\Http\Request;

class ThreadReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $thread = Thread::find($id);
        $reply = $thread->replies()->create([
            'thread_id' => $thread->id,
            'user_id' => $request->get('user_id'),
            'body' => $request->get('body'),
        ]);

        $user = User::find($request->get('user_id'));

        activity()
            ->causedBy($user)
            ->performedOn($thread)
            ->withProperties(['title' => $thread->title])
            ->log('replied to ":properties.title".');

        if ($user->id !== $thread->user_id) {
            $thread->user->notify(new NewCommentNotification($user, $thread));
        }

        return ThreadReplyResource::make($reply);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
