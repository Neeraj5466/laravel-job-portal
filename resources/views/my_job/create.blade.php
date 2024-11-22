<x-layout>
    <x-breadcrumbs :links="['My Jobs'=>route('my-jobs.index'),'Create'=>'#']" />
        <x-card class="mb-4">
            <form action="{{route('my-jobs.store')}}" method="POST">
                @csrf
                <div class="row mb-4 ">
                    <div class="col-sm-6 my-2">
                        <x-label for="title" :required="true">Job Title</x-label>
                        <x-text-input name="title"  />
                    </div>
                    <div class="col-sm-6 my-2">
                        <x-label for="location" :required="true">Job Location</x-label>
                        <x-text-input name="location"  />
                    </div>
                    <div class="col-sm-12 my-2">
                        <x-label for="salary" :required="true">Salary</x-label>
                        <x-text-input name="salary" type="number"/>
                    </div>
                    <div class="col-sm-12 my-2">
                        <x-label for="description" :required="true">Decription</x-label>
                        <x-text-input name="description" type="textarea"/>
                    </div>
                    <div class="col-sm-6 my-2">
                        <x-label for="experience" :required="true">Experience</x-label>
                        <x-radio-group name="experience" :allOption="false" :value="old('experience')" :options="\App\Models\Job::$experience" />
                    </div>
                    <div class="col-sm-6 my-2">
                        <x-label for="category" :required="true">Category</x-label>
                        <x-radio-group name="category" :allOption="false" :value="old('category')" :options="\App\Models\Job::$category" />
                    </div>
                    <div>

                        <x-button class="w-100 my-2">Create Job</x-button>
                    </div>
                </div>
            </form>
        </x-card>
</x-layout>