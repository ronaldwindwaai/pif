<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use App\Models\Resource;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProjectsController extends Controller
{
    private $project;

    public function __construct()
    {
        $this->project = new Project();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $title = 'List of Projects';
        $projects = Project::all();
        $columns = $this->project->get_table_columns();

        $only_columns = Arr::where($columns, function ($value, $key){

            return $value === 'programme_title' || $value === 'project_title'
            || $value === 'activity_name' || $value === 'date_from' || $value === 'date_to' || $value === 'venue';
        });
        return view('pages.project.index')
                        ->with('data',$projects)
                        ->with('columns', $only_columns)
                        ->with('title',$title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add a Project';
        $projects = Project::all();
        $resources = Resource::all();
        $columns = $this->project->get_table_columns();

        $only_columns = Arr::where($columns, function ($value, $key) {

            return $value === 'programme_title' || $value === 'project_title'
            || $value === 'activity_name' || $value === 'date_from' || $value === 'date_to' || $value === 'venue';
        });
        return view('pages.project.add')
            ->with('projects', $projects)
            ->with('resources', $resources)
            ->with('columns', $only_columns)
            ->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        try{
            $validated = $request->validated();
            $project = Project::create($validated);
            $resource = Resource::find($validated);
            $file = $request->file('file')->storeAs('uploads', $request->file('file')->getClientOriginalName());

            $project->resources()->attach($resource);

            $request->session()->flash('success', 'Project was successfully created..');

            return \redirect()
                ->route('projects.index');

        }catch(Exception $exception){
            $request->session()->flash('error', $exception->getMessage());

            dd($exception);
            return \redirect()->back();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, Request $request)
    {
        try {
            $project->resources()->detach($project);
            $project->delete();

            return \redirect()
                ->route('projects.index')
                ->withSuccess('Successfully delete the Project!!');
        } catch (Exception $exception) {
            dd($exception);
            return \redirect()->back()->with('error', $exception->getMessage());
        }

    }
}
