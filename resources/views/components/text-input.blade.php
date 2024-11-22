<div class="position-relative">

    @if ('textarea' != $type)
        @if ($formRef)
            <button type="submit" class="position-absolute top-0 end-0 h-4 w-4 border border-0 bg-white mx-2 my-1"
                @click = "$refs['input-{{ $name }}'].value=''; $refs['{{ $formRef }}'].submit();">x</button>
        @endif

        <input x-ref='input-{{ $name }}' type="{{ $type }}" placeholder="{{ $placeholder }}"
            name="{{ $name }}" value="{{ old($name, $value) }}" id="{{ $name }}"
            @class([
                'w-100 rounded border-2 py-2 px-2 fs-5 form-control bg-white',
                'pe-4' => $formRef,
                'border-danger' => $errors->has($name),
            ])>

    @else
        <textarea   placeholder="{{ $placeholder }}" cols="30" rows="10" name="{{$name}}""
        @class([
                'w-100 rounded border-2 py-2 px-2 fs-5 form-control bg-white',
                'pe-4' => $formRef,
                'border-danger' => $errors->has($name),
            ])>{{ old($name, $value) }}</textarea>

    @endif
    @error($name)
        <div class="mt-1 text-danger fw-bold">
            {{ $message }}
        </div>
    @enderror
</div>
