<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResourceRequest;
use App\Models\Resource;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class ResourcesController extends Controller
{
    private $resource;

    public function __construct()
    {
        $this->resource = new Resource();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'List of Resources';
        $resources = Resource::all();
        $columns = $this->resource->get_table_columns();

        $only_columns = Arr::where($columns, function ($value, $key) {

            return $value === 'title' || $value === 'project_title'
            || $value === 'activity_name' || $value === 'date_from' || $value === 'date_to' || $value === 'venue';
        });
        return view('pages.resource.index')
        ->with('data', $resources)
            ->with('columns', $only_columns)
            ->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add a Resource';

        return view('pages.resource.add')
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
                ->route('resources.index')->withStatus('Resource was successfully created..');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Resource $resource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resource $resource)
    {
        //
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
            dd($resource);
            return \redirect()
                ->route('resources.index')->withStatus('Resource was successfully deleted..');
        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }
}