<x-layout>

    <x-bread-crumbs class="mt-4" :links="['Jobs' => route('jobs.index'), $job->title => '#']" />


    <x-job-card :$job>
        <p class="text-secondaey fs-6">{!! nl2br(e($job->description)) !!}</p>



        @auth

            @can('apply', $job)
                <x-link-btn :href="route('job.application.create', $job)">Apply</x-link-butn>
                @else
                    <div class="text-center fw-bold text-secondary fs-5">You already applied to this job</div>
                @endcan
            @endauth

    </x-job-card>

    <x-card class="mb-4 m-4">
        <h2 class="mb-4 fs-4 fw-bold">
            More {{ $job->employer->company_name }}
        </h2>
        <div class="fs-5 text-secondary">
            @foreach ($job->employer->jobs as $otherJob)
                <div class="d-flex mb-4  justify-content-between">
                    <div>
                        <div>
                            <a href="{{ route('jobs.show', $otherJob) }}"
                                class="nav-link fw-bold">{{ $otherJob->title }}</a>

                        </div>
                        <div>
                            {{ $otherJob->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div>
                        ${{ number_format($otherJob->salary) }}
                    </div>
                </div>
            @endforeach
        </div>
    </x-card>

</x-layout>
