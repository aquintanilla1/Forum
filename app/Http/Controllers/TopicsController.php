<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;

class TopicsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /** Will be Homepage for the application
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $content = array(
            'title' => $this->title,
            'heading' => 'Topic List',
            'topics' => Topic::withCount('comments')->paginate(5)
        );
        return view('topics.index', $content);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $content = array(
            'title' => $this->title,
            'heading' => 'Create a Topic',
        );
        return view('topics.create', $content);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'topicTitle' => 'required|max:255',
            'topicBody' => 'required|max:1000'
        ]);

        $topic = new Topic;
        $topic->topicTitle = $request->input('topicTitle');
        $topic->topicBody = $request->input('topicBody');
        $topic->user_id = auth()->user()->id;

        $topic->save();

        $content = array(
            'title' => $this->title,
            'topic' => $topic
        );

        return view('topics.show', $content)->with('success', 'Topic Created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $content = array(
            'title' => $this->title,
            'topic' => Topic::find($id)
        );

        return view('topics.show', $content);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $topic = Topic::find($id);

        $content = array(
            'title' => $this->title,
            'topic' => $topic
        );

        if (auth()->user()->id != $topic->user_id) {
            return redirect()->back()->with('error' , 'Unauthorized Page');
        }
        return view('topics.edit', $content);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'topicTitle' => 'required|max:255',
            'topicBody' => 'required|max:1000'
        ]);

        $topic = Topic::find($id);
        $topic->topicTitle = $request->input('topicTitle');
        $topic->topicBody = $request->input('topicBody');

        $topic->save();

        $content = array(
            'title' => $this->title,
            'topic' => Topic::find($id)
        );

        return view('topics.show', $content)->with('success', 'Topic Edited!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $topic = Topic::find($id);

        if (auth()->user()->id != $topic->user_id) {
            return redirect()->back()->with('error' , 'Unauthorized Page');
        }
        $topic->delete();

        return redirect('/')->with('success', 'Topic Deleted');

    }
}
