<x-layout>
    <x-bread-crumbs class="mt-4"  :links="['Jobs'=>route('jobs.index'),$job->title=> route('jobs.show',$job),'Apply'=>'#']" />
        <x-job-card :$job />
    <x-card class="mx-4">
        <h2 class="mb-4 fs-4 fw-bold">
            Your Job Application 
        </h2>

        <form action="{{route('job.application.store',$job)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <x-label for="expected_salary" :required="true">Expected salary</x-label>
                <x-text-input type="number" name="expected_salary" />
            </div>

            <div class="mb-4">
                <x-label for="cs" :required="true">Upload Cv</x-label>
                <x-text-input type="file" name="cv" class="form-control"></x-text-input>
            </div>
           

            <x-button class="w-100">Apply</x-button>
        </form>
    </x-card>
</x-layout>