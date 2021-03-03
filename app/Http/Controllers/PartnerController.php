<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartnerRequest;
use App\Models\Partner;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    private $partner;
    private $page;

    public function __construct()
    {
        $this->partner = new Partner();
        $this->page = 'partners';
    }
    /**
     * Display a listing of the partner.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $title = 'List of Partners';

            $partners = Partner::all();

            $columns    =   $this->partner->get_columns();

            return view('pages.partner.index')
                ->with('data', $partners)
                ->with('columns', $columns)
                ->with('title', $title);
        } catch (Exception $exception) {

            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Show the form for creating a new partner.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add a Partner';

        return view('pages.partner.add')
            ->with('page', $this->page)
            ->with('title', $title);
    }

    /**
     * Store a newly created partner in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePartnerRequest $request)
    {
        try {

            $validated = $request->validated();

            $partner = new Partner($validated);
            $partner->user_id = Auth::user()->id;
            $partner->save();

            //$request->session()->flash('success', 'partner was successfully created..');

            return \redirect()
                ->route('partners.index')->withStatus('The  (' . strtoupper($partner->title) . ') Partner was successfully created..');
        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Display the specified partner.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        try {

            $title = $partner->title;

            $columns    =   $this->partner->get_columns();

            return view('pages.partner.show')
                ->with('data', $partner)
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
     * Show the form for editing the specified partner.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        try {

            $title = $partner->title;

            return view('pages.partner.edit')
                ->with('data', $partner)
                ->with('page', $this->page)
                ->with('title', $title);
        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Update the specified partner in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(StorePartnerRequest $request, Partner $partner)
    {
        try {

            $validated = $request->validated();

            $partner->fill($validated);
            $partner->user_id = Auth::user()->id;
            $partner->save();

            return \redirect()
                ->route('partners.index')->withStatus('The  (' . strtoupper($partner->title) . ') Partner was successfully updated..');
        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Remove the specified partner from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        try {
            $title = $partner->title;
            $partner->delete();

            return \redirect()
                ->route('partners.index')
                ->withStatus('Successfully deleted the (' . strtoupper($title) . ') Partner');
        } catch (Exception $exception) {
            return \redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
