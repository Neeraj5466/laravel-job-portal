<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAnyEmployer',Job::class);

        return view('my_job.index',['jobs'=>auth()->user()->employer->jobs()
    ->with(['employer','jobApplications','jobApplications.user'])
    ->withTrashed()
    ->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',Job::class);
        return view('my_job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {
       
        $this->authorize('create',Job::class);

        auth()->user()->employer->jobs()->create($request->validated());

        return redirect()->route('my-jobs.index')->with('success','Job created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $myJob)
    {
        $this->authorize('update',$myJob);
        return view('my_job.edit',['job'=>$myJob]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobRequest $request, Job $myJob)
    {
        $this->authorize('update',$myJob);
        $myJob->update($request->validated());

        return redirect()->route('my-jobs.index')->with('success','Job updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $myJob)
    {
        $myJob->delete();

        return redirect()->route('my-jobs.index')->with('success','Job has been deleted successfully');
    }

    public function downloadCv($id)
    {
        // Retrieve the job application by ID
        $application = JobApplication::findOrFail($id);

        // Get the CV path from the application
        $cvPath = $application->cv_path;

        // Check if the file exists in the private storage
        if (Storage::disk('private')->exists($cvPath)) {
            // Return the file as a download response
            return Storage::disk('private')->download($cvPath);
        }

        // If the file does not exist, you can return a 404 response
        return abort(404, 'CV not found.');
    }
}
