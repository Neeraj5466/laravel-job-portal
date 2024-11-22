<x-layout>
    <x-breadcrumbs :links="['My Jobs'=>route('my-jobs.index'),'Edit Job'=>'#']" />
        <x-card class="mb-4">
            <form action="{{route('my-jobs.update',$job)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-4 ">
                    <div class="col-sm-6 my-2">
                        <x-label for="title" :required="true">Job Title</x-label>
                        <x-text-input name="title" :value="$job->title" />
                    </div>
                    <div class="col-sm-6 my-2">
                        <x-label for="location" :required="true">Job Location</x-label>
                        <x-text-input name="location" :value="$job->location" />
                    </div>
                    <div class="col-sm-12 my-2">
                        <x-label for="salary" :required="true">Salary</x-label>
                        <x-text-input name="salary" type="number" :value="$job->salary"/>
                    </div>
                    <div class="col-sm-12 my-2">
                        <x-label for="description" :required="true">Decription</x-label>
                        <x-text-input name="description" type="textarea" :value="$job->description"/>
                    </div>
                    <div class="col-sm-6 my-2">
                        <x-label for="experience" :required="true">Experience</x-label>
                        <x-radio-group name="experience" :allOption="false" :value="$job->experience" :options="\App\Models\Job::$experience" />
                    </div>
                    <div class="col-sm-6 my-2">
                        <x-label for="category" :required="true">Category</x-label>
                        <x-radio-group name="category" :allOption="false" :value="$job->category" :options="\App\Models\Job::$category" />
                    </div>
                    <div>

                        <x-button class="w-100 my-2">Edit Job</x-button>
                    </div>
                </div>
            </form>
        </x-card>
</x-layout>