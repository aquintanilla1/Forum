<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Vote;

class VotesController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Stores or alters a vote
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $vote = Input::get('vote');
        $comment_id = Input::get('comment_id');
        $user_id = auth()->user()->id;
        $topic_id = Input::get('topic_id');

        $voteExists = DB::table('votes')
            ->where('user_id', $user_id)
            ->where('comment_id', $comment_id)
            ->exists();

        if ($voteExists) { //User already voted on this comment -> Edit vote
            $vote_id = DB::table('votes')
                ->where('user_id', $user_id)
                ->where('comment_id', $comment_id)
                ->value('id');

            $voteEntry = Vote::find($vote_id);

            if ($voteEntry->vote == $vote) {
                $voteEntry->vote = 0;
            }
            else {
                $voteEntry->vote = $vote;
            }
        }
        else { //User is voting on this comment for the first time -> New vote
            $voteEntry = new Vote;
            $voteEntry->vote = $vote;
            $voteEntry->user_id = $user_id;
            $voteEntry->comment_id = $comment_id;
        }

        $voteEntry->save();
        return redirect('/topics/' . $topic_id);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
