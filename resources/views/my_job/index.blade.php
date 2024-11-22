<x-layout>
    <x-breadcrumbs :links="['My Jobs' => '#']" />

    <div class="mb-4 text-end me-2">

        <x-link-btn href="{{ route('my-jobs.create') }}">
            Add Job
        </x-link-btn>

    </div>


    @forelse ($jobs as $job)
        <x-job-card :$job>
            <div>
                @forelse ($job->jobApplications as $application)
                    <div class="mb-4 d-flex justify-content-between">
                        <div>
                            <div>{{$application->user->name}}</div>
                            <div>
                                Applied {{$application->created_at->diffForHumans()}}
                            </div>
                            <div>
                                <a href="{{ route('download.cv', $application->id) }}" class="btn btn-sm btn-warning">Download CV</a>
                            </div>
                        </div>
                        <div>
                            ${{number_format($application->expected_salary)}}
                        </div>
                    </div>
                @empty

                <div class="my-4">No applications yet</div>
                  
                @endforelse

                <div class="d-flex gap-2">
                    <x-link-btn href="{{route('my-jobs.edit',$job)}}">Edit</x-link-btn>
                    <form action="{{route('my-jobs.destroy',$job)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button >Delete</x-button>
                    </form>
                </div>

            </div>
        </x-job-card>
    @empty
        
    <div class="border rounded p-4 border-dashed">
        <div class="text-center fw-bold">
            No Job yet
        </div>
        <div class="text-center">
            Post your firts job <a href="{{route('my-jobs.create')}}">here!</a>
        </div>
   </div>

    @endforelse


</x-layout>
