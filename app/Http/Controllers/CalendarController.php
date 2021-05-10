<?php

namespace App\Http\Controllers;

use App\Http\Resources\CalendarResource;
use App\Models\Meeting;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        return CalendarResource::collection(Meeting::with('programme','project')->get());
    }
}
