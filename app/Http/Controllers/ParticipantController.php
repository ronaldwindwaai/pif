<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParticipantRequest;
use App\Models\Meeting;
use App\Models\Participant;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ParticipantController extends Controller
{
    private $participant;
    private $page;

    public function __construct()
    {
        $this->participant  = new Participant();
        $this->page     = 'participants';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $title = 'List of Participants';
            $participants = DB::table('participants')
                ->join('meetings', 'participants.meeting_id', '=', 'meetings.id')
                ->select('participants.id', DB::raw("CONCAT(participants.first_name,' ',participants.last_name) as full_name"),
                'participants.registration_date','meetings.title as meeting_title','participants.country',
                'participants.organization')
                ->get();

            $columns    =   $this->participant->get_columns();

            return view('pages.participant.index')
                ->with('data', $participants)
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
            $title = 'Add a Participant';

            $meetings = Meeting::all();

            return view('pages.participant.add')
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParticipantRequest $request)
    {
        try {

            $validated = $request->validated();

            $participant = new Participant($validated);
            $participant->user_id = Auth::user()->id;
            $participant->save();

            return \redirect()
                ->route('participants.index')->withStatus('The  (' . strtoupper($participant->title) . ') Participant was successfully created..');
        } catch (Exception $exception) {

            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(Participant $participant)
    {
        try {
            $participant = DB::table('participants')
                ->join('users', 'participants.user_id', '=', 'users.id')
                ->where('participants.id', $participant->id)
                ->select('participants.id', DB::raw("CONCAT(participants.first_name,' ',participants.last_name) as full_name"), 'participants.date as participant_dates', 'users.name as added_by', 'participants.status')
                ->first();

            $title = $participant->title;
            $columns    =   $this->participant->get_columns();

            return view('pages.participant.show')
            ->with('data', $participant)
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
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */

    public function edit(Participant $participant)
    {
        try {
            $title = $participant->title;

            return view('pages.participant.edit')
            ->with('data', $participant)
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
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(StoreParticipantRequest $request, Participant $participant)
    {
        try {
            $validated = $request->validated();
            $participant->fill($validated);
            $participant->user_id = Auth::user()->id;
            $participant->save();

            return \redirect()
                ->route('participants.index')->withStatus('The  (' . strtoupper($participant->title) . ') Participant was successfully updated..');
        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        try {
            $title = $participant->title;
            $participant->delete();

            return \redirect()
                ->route('participants.index')
                ->withStatus('Successfully deleted the (' . strtoupper($title) . ') Participant');
        } catch (Exception $exception) {
            dd($exception);
            return \redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
