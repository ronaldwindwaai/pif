<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResourceRequest;
use App\Models\Resource;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResourceController extends Controller
{
    private $resource;
    private $page;

    public function __construct()
    {
        $this->resource = new Resource();
        $this->page = 'resources';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $title = 'List of Resources';

            $resources = DB::table('resources')
            ->join('users', 'resources.user_id', '=', 'users.id')
            ->select('resources.id', 'resources.title', 'users.name as added_by', 'resources.created_at')
            ->get();

            $columns    =   $this->resource->get_columns();

            return view('pages.resource.index')
            ->with('data', $resources)
                ->with('columns', $columns)
                ->with('title', $title);

        } catch (Exception $exception) {

            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add a Resource';

        return view('pages.resource.add')
            ->with('page', $this->page)
            ->with('title', $title);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResourceRequest $request)
    {
        try {

            $validated = $request->validated();

            $resource = new Resource($validated);
            $resource->user_id = Auth::user()->id;
            $resource->save();

            //$request->session()->flash('success', 'Resource was successfully created..');

            return \redirect()
                ->route('resources.index')->withStatus('The  (' . strtoupper($resource->title) . ') Resource was successfully created..');
        } catch (Exception $exception) {
            return \redirect()
                    ->back()
                    ->withErrors($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Resource $resource)
    {
        try {
            $resource = DB::table('resources')
            ->join('users', 'resources.user_id', '=', 'users.id')
            ->where('resources.id', $resource->id)
            ->select('resources.id', 'resources.title', 'users.name as added_by', 'resources.created_at')
            ->first();

            $title = $resource->title;

            $columns    =   $this->resource->get_columns();

            return view('pages.resource.show')
            ->with('data', $resource)
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
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Resource $resource)
    {
        try {

            $title = $resource->title;

            return view('pages.resource.edit')
            ->with('data', $resource)
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
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(StoreResourceRequest $request, Resource $resource)
    {
        try {

            $validated = $request->validated();

            $resource->fill($validated);
            $resource->user_id = Auth::user()->id;
            $resource->save();

            return \redirect()
                ->route('resources.index')->withStatus('The  (' . strtoupper($resource->title) . ') Resource was successfully updated..');
        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        try {
            $title = $resource->title;
            $resource->delete();

            return \redirect()
                ->route('resources.index')
                ->withStatus('Successfully deleted the (' . strtoupper($title) . ') Resource');
        } catch (Exception $exception) {
            return \redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
