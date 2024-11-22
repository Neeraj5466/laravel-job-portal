<x-layout>
    <x-breadcrumbs class="mb-2" :links="['My Job Applications'=> '#']"/>

        @forelse ($applications as $application)
            <x-job-card :job="$application->job">
                <div class="d-flex justify-content-between justify-content-center">
                    <div>
                        <div>
                            Applied {{$application->created_at->diffForHumans()}}
                        </div>
                        <div>
                            Other {{Str::plural('applicant',$application->job->job_applications_count-1)}}
                            {{$application->job->job_applications_count}}
                        </div>
                        <div>
                            Your asking salary is ${{number_format($application->expected_salary)}}
                        </div>

                        <div>
                            Average asking salary is ${{number_format($application->job->job_applications_avg_expected_salary)}}
                        </div>
                    </div>
                    <div>
                        <form action="{{route('my-job-applications.destroy',$application)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-button>Cancel</x-button>

                        </form>
                    </div>
                </div>
            </x-job-card>
        @empty

        <div class="border border-dashed rounded p-4">
            <div class="text-center">
                No Job Application yet
            </div>
            <div class="text-center">
                Go find some jobs <a href="{{route('jobs.index')}}">here</a>
            </div>
        </div>
            
        @endforelse

</x-layout>