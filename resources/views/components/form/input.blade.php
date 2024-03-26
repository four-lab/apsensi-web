<label
    for="{{ $name }}"
    class="form-label"
>{{ $label }}</label>
<input
    type="{{ $type ?? 'text' }}"
    class="form-control @error($name) is-invalid @enderror"
    id="{{ $name }}"
    wire:model="{{ $name }}"
    autofocus
>

@error($name)
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
