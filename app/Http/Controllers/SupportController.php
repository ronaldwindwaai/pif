<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupportRequest;
use App\Models\Support;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SupportController extends Controller
{
    private $support;
    private $page;

    public function __construct()
    {
        $this->support = new Support();
        $this->page = 'supports';
    }
    /**
     * Display a listing of the Support.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $title = 'List of Supoort Request';

            $supports = DB::table('supports')
            ->join('users', 'supports.user_id', '=', 'users.id')
            ->select('supports.id', 'supports.title', 'users.name as added_by', 'supports.created_at')
            ->get();

            $columns    =   $this->support->get_columns();

            return view('pages.support.index')
            ->with('data', $supports)
                ->with('columns', $columns)
                ->with('title', $title);
        } catch (Exception $exception) {

            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Show the form for creating a new support.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add a Support';

        return view('pages.support.add')
        ->with('page', $this->page)
            ->with('title', $title);
    }

    /**
     * Store a newly created support in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupportRequest $request)
    {
        try {

            $validated = $request->validated();

            $support = new Support($validated);
            $support->user_id = Auth::user()->id;
            $support->save();

            //$request->session()->flash('success', 'Support was successfully created..');

            return \redirect()
                ->route('supports.index')->withStatus('The  (' . strtoupper($support->title) . ') Support was successfully created..');
        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Display the specified support.
     *
     * @param  \App\Models\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function show(Support $support)
    {
        try {
            $support = DB::table('supports')
            ->join('users', 'supports.user_id', '=', 'users.id')
            ->where('supports.id', $support->id)
                ->select('supports.id', 'supports.title', 'users.name as added_by', 'supports.created_at')
                ->first();

            $title = $support->title;

            $columns    =   $this->support->get_columns();

            return view('pages.support.show')
                ->with('data', $support)
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
     * Show the form for editing the specified support.
     *
     * @param  \App\Models\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function edit(Support $support)
    {
        try {

            $title = $support->title;

            return view('pages.support.edit')
            ->with('data', $support)
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
     * Update the specified support in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSupportRequest $request, Support $support)
    {
        try {

            $validated = $request->validated();

            $support->fill($validated);
            $support->user_id = Auth::user()->id;
            $support->save();

            return \redirect()
                ->route('supports.index')->withStatus('The  (' . strtoupper($support->title) . ') Support was successfully updated..');
        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Remove the specified support from storage.
     *
     * @param  \App\Models\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function destroy(Support $support)
    {
        try {
            $title = $support->title;
            $support->delete();

            return \redirect()
                ->route('supports.index')
                ->withStatus('Successfully deleted the (' . strtoupper($title) . ') Support');

        } catch (Exception $exception) {
            dd($exception);
            return \redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
