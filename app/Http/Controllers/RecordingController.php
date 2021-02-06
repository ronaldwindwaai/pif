<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecordingRequest;
use App\Http\Requests\StoreResourceRequest;
use App\Models\Meeting;
use App\Models\Recording;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecordingController extends Controller
{
    private $recording;
    private $page;

    public function __construct()
    {
        $this->recording = new Recording();
        $this->page =   'recordings';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $title = 'List of Recordings';

        /*$projects = DB::table('projects')
            ->select('id','title', 'date_from', 'date_to', 'created_at')
            ->get();*/

        $recordings = DB::table('recordings')
        ->join('users', 'recordings.user_id', '=', 'users.id')
        ->join('meetings', 'meetings.id', '=', 'recordings.meeting_id')
        ->select('recordings.id', 'recordings.title', 'users.name as added_by', 'meetings.title as meeting_name','recordings.created_at')
        ->get();

        $columns    =   $this->recording->get_columns();

        return view('pages.recordings.index')
        ->with('data', $recordings)
            ->with('columns', $columns)
            ->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add a Recording';
        $meetings = Meeting::all();

        return view('pages.recordings.add')
            ->with('meetings', $meetings)
            ->with('page', $this->page)
            ->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecordingRequest $request)
    {
        try {
            $validated = $request->validated();

            $recording = new Recording($validated);
            $recording->user_id = Auth::user()->id;
            $recording->meeting_id = $request->meeting_id;
            $recording->save();

            return \redirect()
                ->route('recordings.index')->withStatus('The  (' . strtoupper($recording->title) . ') Recording was successfully created..');
        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Recording $recording)
    {
        try {

            $title = $recording->title;

            $columns    =   $this->recording->get_columns();

            return view('pages.recordings.show')
            ->with('data', $recording)
            ->with('columns', $columns)
            ->with('page', $this->page)
            ->with('title', $title);

        } catch (Exception $exception) {
            dd($exception);
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Recording $recording)
    {
        try {

            $title = $recording->title;
            $meetings = Meeting::all();

            return view('pages.recordings.edit')
                ->with('data', $recording)
                ->with('page', $this->page)
                ->with('meetings', $meetings)
                ->with('title', $title);

        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(StoreResourceRequest $request, Recording $recording)
    {
        try {
            $validated = $request->validated();

            $recording->fill($validated);
            $recording->user_id = Auth::user()->id;
            $recording->meeting_id = $request->meeting_id;
            $recording->save();

            return \redirect()
                ->route('recordings.index')->withStatus('The  (' . strtoupper($recording->title) . ') Recording was successfully updated..');
        } catch (Exception $exception) {
            dd($exception);
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recording $recording, Request $request)
    {
        try {
            $title = $recording->title;
            $recording->delete();

            return \redirect()
                ->route('recordings.index')
                ->withStatus('Successfully deleted the (' . strtoupper($title) . ') recording');
        } catch (Exception $exception) {
            return \redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
