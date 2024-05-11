<label
    for="{{ $name }}"
    class="{{ $bold ?? false ? 'form-label' : '' }}"
>{{ $label }}</label>

<select
    wire:model.change="{{ $name }}"
    id="{{ $name }}"
    class="form-control @error($name) is-invalid @enderror"
>
    <option value="">-- Pilih --</option>
    @foreach ($items as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
</select>

@error($name)
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
