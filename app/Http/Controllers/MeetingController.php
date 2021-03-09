<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMeetingRequest;
use App\Models\Meeting;
use App\Models\Partner;
use App\Models\Programme;
use App\Models\Project;
use App\Models\Resource;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MeetingController extends Controller
{
    private $meeting;
    private $page;

    public function __construct()
    {
        $this->meeting  = new Meeting();
        $this->page     = 'meetings';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $title = 'List of Meetings';
            $meetings = DB::table('meetings')
                ->join('projects', 'meetings.project_id','=','projects.id')
                ->select('meetings.id', 'meetings.title','meetings.date as meeting_dates','projects.title as project_name', 'meetings.status')
                ->get();

            $columns    =   $this->meeting->get_columns();

            return view('pages.meeting.index')
                ->with('data', $meetings)
                ->with('columns', $columns)
                ->with('title', $title);

        } catch (Exception $exception) {
            dd($exception);
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $title = 'Add a Meeting';

            $resources = Resource::all();
            $programmes = Programme::all();
            $projects = Project::all();
            $partners = Partner::all();
            $users = User::all();

            return view('pages.meeting.add')
                ->with('page', $this->page)
                ->with('resources', $resources)
                ->with('programmes', $programmes)
                ->with('projects', $projects)
                ->with('partners', $partners)
                ->with('users',$users)
                ->with('title', $title);

        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMeetingRequest $request)
    {
        try {

            $validated = $request->validated();

            dd($validated);

            $meeting = new Meeting($validated);
            $meeting->user_id = Auth::user()->id;
            $meeting->save();

            return \redirect()
                ->route('meeting.index')->withStatus('The  (' . strtoupper($meeting->title) . ') Meeting was successfully created..');
        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function show(Meeting $meeting)
    {
        try {
            $meeting = DB::table('meetings')
            ->join('users', 'meetings.user_id', '=', 'users.id')
            ->where('meetings.id', $meeting->id)
                ->select('meetings.id', 'meetings.title', 'meetings.date as meeting_dates', 'users.name as added_by', 'meetings.status')
                ->first();

            $title = $meeting->title;
            $columns    =   $this->meeting->get_columns();

            return view('pages.meeting.show')
                ->with('data', $meeting)
                ->with('columns', $columns)
                ->with('page', $this->page)
                ->with('title', $title);

        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */

    public function edit(Meeting $meeting)
    {
        try {
            $title = $meeting->title;

            return view('pages.meeting.edit')
                ->with('data', $meeting)
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMeetingRequest $request, Meeting $meeting)
    {
        try {
            $validated = $request->validated();
            $meeting->fill($validated);
            $meeting->user_id = Auth::user()->id;
            $meeting->save();

            return \redirect()
                ->route('meetings.index')->withStatus('The  (' . strtoupper($meeting->title) . ') Meeting was successfully updated..');
        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meeting $meeting)
    {
        try {
            $title = $meeting->title;
            $meeting->delete();

            return \redirect()
                ->route('meetings.index')
                ->withStatus('Successfully deleted the (' . strtoupper($title) . ') Meeting');
        } catch (Exception $exception) {
            dd($exception);
            return \redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
