<div>
    @if ($allOption)
        
   
    <label for="{{$name}}" class="mb-2 d-flex align-items-center ">
        <input type="radio" name="{{$name}}" value="" @checked(!request($name)) />
        <span class="ms-2">All</span>
    </label>

    @endif


    @foreach ($options as $option)
        

    <label for="{{$name}}" class="mb-2 d-flex align-items-center ">
        <input type="radio" name="{{$name}}" value="{{$option}}" @checked(($value ?? request($name))===$option) />
        <span class="ms-2">{{Str::ucfirst($option)}}</span>
    </label>

    @endforeach
    @error($name)
        <div class="mt-1 text-danger fw-bold">
            {{ $message }}
        </div>
    @enderror

</div>