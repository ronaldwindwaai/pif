<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProgrammeRequest;
use App\Models\Programme;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProgrammeController extends Controller
{
    private $programme;
    private $page;

    public function __construct()
    {
        $this->programme    = new Programme();
        $this->page =   'programmes';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $title = 'List of Programmes';

            $programmes = DB::table('programmes')
                        ->join('users', 'programmes.user_id', '=', 'users.id')
                        ->select('programmes.id', 'programmes.title','users.name', 'programmes.created_at')
                        ->get();

            $columns    =   $this->programme->get_columns();

            return view('pages.programme.index')
            ->with('data', $programmes)
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
            $title = 'Add a Programme';

            return view('pages.programme.add')
                ->with('page', $this->page)
                ->with('title', $title);
        }catch(Exception $exception)
        {
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
    public function store(StoreProgrammeRequest $request)
    {
        try {

            $validated = $request->validated();

            $programme = new Programme($validated);
            $programme->user_id = Auth::user()->id;
            $programme->save();

            return \redirect()
                ->route('programmes.index')->withStatus('The  ('. strtoupper($programme->title).') Programme was successfully created..');
        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function show(Programme $programme)
    {
        try {

            $title = $programme->title;

            $columns    =   $this->programme->get_columns();

            return view('pages.programme.index')
            ->with('data', $programme)
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
     * @param  \App\Models\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function edit(Programme $programme)
    {
        try {

            $title = $programme->title;

            return view('pages.programme.edit')
            ->with('data', $programme)
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
     * @param  \App\Models\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProgrammeRequest $request, Programme $programme)
    {
        try {

            $validated = $request->validated();

            $programme->update($validated);

            return \redirect()
                ->route('programmes.index')->withStatus('The  (' . strtoupper($programme->title) . ') Programme was successfully updated..');
        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programme $programme)
    {
        try {
            $title = $programme->title;
            $programme->delete();

            return \redirect()
                ->route('programmes.index')
                ->withStatus('Successfully deleted the ('. strtoupper($title).') Programme');
        } catch (Exception $exception) {
            dd($exception);
            return \redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function delete_selected($id)
    {
        dd($id);
    }
}
