<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Models\Programme;
use App\Models\Project;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class ProjectController extends Controller
{
    private $project;
    private $page;

    public function __construct()
    {
        $this->project = new Project();
        $this->page =   'projects';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $title = 'List of Projects';

        /*$projects = DB::table('projects')
            ->select('id','title', 'date_from', 'date_to', 'created_at')
            ->get();*/

        $projects = DB::table('projects')
        ->join('users', 'projects.officer_id', '=', 'users.id')
        ->join('programmes', 'programmes.id', '=', 'projects.programme_id')
        ->select('projects.id', 'projects.title', 'users.name as officer', 'programmes.title as programme', 'projects.created_at')
        ->get();

        $columns    =   $this->project->get_columns();

        return view('pages.project.index')
                        ->with('data',$projects)
                        ->with('columns', $columns)
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
        $programmes = Programme::all();
        $officers = Role::where('name', 'officer')->first()->users()->get();

        return view('pages.project.add')
            ->with('page', $this->page)
            ->with('programmes',$programmes)
            ->with('title', $title)
            ->with('officers',$officers);
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

            $project = new Project($validated);
            $project->user_id = Auth::user()->id;
            $project->save();

            return \redirect()
                ->route('projects.index')->withStatus('The  (' . strtoupper($project->title) . ') Project was successfully created..');
        }catch(Exception $exception){
            dd($exception);
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
    public function show(Project $project)
    {
        try {

            $project = DB::table('projects')
                ->join('users', 'projects.officer_id', '=', 'users.id')
                ->join('programmes', 'programmes.id', '=', 'projects.programme_id')
                ->where('projects.id', $project->id)
                ->select('projects.id', 'projects.title', 'users.name as officer', 'programmes.title as programme', 'projects.created_at')
                ->first();

            $title = $project->title;
            $columns    =   $this->project->get_columns();
            return view('pages.project.show')
                ->with('data', $project)
                ->with('page', $this->page)
                ->with('columns',$columns)
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
    public function edit(Project $project)
    {
        try {

            $title = $project->title;
            $programmes = Programme::all();
            $officers = Role::where('name', 'officer')->first()->users()->get();


            return view('pages.project.edit')
                ->with('data', $project)
                ->with('page', $this->page)
                ->with('title', $title)
                ->with('programmes', $programmes)
                ->with('officers',$officers);

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
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProjectRequest $request, Project $project)
    {
        try {

            $validated = $request->validated();

            $project->fill($validated);
            $project->user_id = Auth::user()->id;
            $project->save();

            return \redirect()
                ->route('projects.index')->withStatus('The  (' . strtoupper($project->title) . ') Project was successfully updated..');
        } catch (Exception $exception) {
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
    public function destroy(Project $project, Request $request)
    {
        try {
            $title = $project->title;
            $project->delete();

            return \redirect()
                ->route('projects.index')
                ->withStatus('Successfully deleted the (' . strtoupper($title) . ') Project');
        } catch (Exception $exception) {
            dd($exception);
            return \redirect()->back()->with('error', $exception->getMessage());
        }

    }
}
