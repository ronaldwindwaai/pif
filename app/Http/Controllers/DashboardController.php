<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Participant;
use App\Models\Programme;
use App\Models\Project;
use App\Models\Recording;
use App\Models\Support;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.dashboard')
            ->with('meetings', $this->get_num_of_meetings())
            ->with('registered', $this->get_num_of_registered())
            ->with('projects', $this->get_num_of_projects())
            ->with('programmes', $this->get_num_of_programmes())
            ->with('recordings', $this->get_num_of_recordings())
            ->with('support_request', $this->get_num_of_support_request());
    }

    private function get_num_of_meetings()
    {
        return Meeting::count();
    }

    private function get_num_of_registered()
    {
        return Participant::count();
    }

    private function get_num_of_projects()
    {
        return Project::count();
    }

    private function get_num_of_programmes()
    {
        return Programme::count();
    }

    private function get_num_of_recordings()
    {
        return Recording::count();
    }

    private function get_num_of_support_request()
    {
        return Support::count();
    }
}
