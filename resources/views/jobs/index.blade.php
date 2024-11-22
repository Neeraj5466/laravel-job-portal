<x-layout>
    <div class="container mt-4">

        <x-bread-crumbs class="mt-4"  :links="['Jobs'=>route('jobs.index')]" />

            <x-card class="mb-4 fs-4 my-4" x-data="">
                <form action="{{route('jobs.index')}}" method="GET" id="filtering-form" x-refs="filters">
               
                <div class="mb-4 row gap-4">

                    <div class="col-4">
                        <div class="mb-1 fw-bold">Search</div>
                        <x-text-input name="search" value="{{request('search')}}" placeholder="Search for any text" form-ref="filters"/>
                  
                    </div>
                    <div class="col-4">
                        <div class="mb-1 fw-bold">Salary</div>
                       <div class="d-flex gap-2">
                        <x-text-input name="min_salary" value="{{request('min_salary')}}" placeholder="Min Salary" form-ref="filters"/>
                     
                        <x-text-input name="max_salary" value="{{request('max_salary')}}" placeholder="Max Salary" form-ref="filters"/>
                    
                       </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-1 fw-bold">Experience</div>

                        <x-radio-group name="experience" :options="\App\Models\Job::$experience"/>


                    </div>
                    <div class="col-4">
                        <div class="mb-1 fw-bold">Category</div>
                        <x-radio-group name="category" :options="\App\Models\Job::$category"/>
                    </div>

                </div>

                <x-button href="#" class="w-100">Filters</x-button>
            </form>
            </x-card>

    @foreach ($jobs as $job)
        
    <x-job-card :$job>

    <div>
        <x-link-btn :href="route('jobs.show',$job)">
            Show
        </x-link-btn>
    </div>

    </x-job-card>
       
    @endforeach
</div>

</x-layout>