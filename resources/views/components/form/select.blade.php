<label
    for="{{ $name }}"
    class="{{ $bold ?? false ? 'form-label' : '' }}"
>{{ $label }}</label>

<select
    wire:model="{{ $name }}"
    id="{{ $name }}"
    class="form-control @error($name) is-invalid @enderror"
>
    @foreach ($items as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
</select>

@error($name)
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
