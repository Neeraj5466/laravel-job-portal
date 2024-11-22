

<x-card class="my-4 mx-4">
    <div class="mb-4 d-flex justify-content-between">
        <h2 class="fs-4 fw-bold">{{$job->title}}</h2>
        <div class="text-secondary">${{number_format($job->salary)}}</div>
    </div>

    <div class="mb-4 d-flex justify-content-between text-secondary align-items-center">
        <div class="d-flex gap-4">
            <div>{{$job->employer->company_name}}</div>
            <div>{{$job->location}}</div>
            @if ($job->deleted_at)
                <span class="fs-6 text-danger">Deleted</span>
            @endif
        </div>
        <div class="d-flex gap-4">
            <x-tag>
                <a href="{{route('jobs.index',['experience'=>$job->experience])}}" class="nav-link">{{Str::ucfirst($job->experience)}}</a>
                
            </x-tag>
            <x-tag>
                <a href="{{route('jobs.index',['category'=>$job->category])}}" class="nav-link">  {{$job->category}}</a>
              
            </x-tag>
         
        </div>
       
    </div>

 

    {{$slot}}

    {{-- <div>
       
        <x-link-btn :href="route('jobs.show',$job)">
            Show
        </x-link-btn>

    </div> --}}

   
 </x-card>