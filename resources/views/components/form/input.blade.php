<label
    for="{{ $name }}"
    class="{{ $bold ?? false ? 'form-label' : '' }}"
>{{ $label }}</label>
<input
    type="{{ $type ?? 'text' }}"
    class="form-control @error($name) is-invalid @enderror"
    id="{{ $name }}"
    placeholder="{{ $placeholder ?? '' }}"
    wire:model="{{ $name }}"
>

@error($name)
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
