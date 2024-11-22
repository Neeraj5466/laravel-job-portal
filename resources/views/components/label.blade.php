<label for="{{$for}}" class="mb-2 block fs-4 fw-bold text-secondary">
    {{$slot}} 
    @if ($required)
    <span>*</span>
    @endif
</label>