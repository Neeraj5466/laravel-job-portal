<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $this->authorize('viewAny',Job::class);

        $filters=request()->only('search','min_salry','max_salary','experience','category');

       

        return view('jobs.index',['jobs'=>Job::with('employer')->filter($filters)->get()]);
    }

  
    public function show(Job $job)
    {

        $this->authorize('view',$job);

        return view('jobs.show',['job'=>$job->load('employer.jobs')]);
    }

   
    public function destroy(string $id)
    {
        //
    }
}
