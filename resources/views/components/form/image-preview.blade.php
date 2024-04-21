@php
    if (is_string($photo)) {
        $photo = Storage::url($photo);
    }

    if ($photo instanceof Livewire\Features\SupportFileUploads\TemporaryUploadedFile) {
        try {
            $photo = $photo->temporaryUrl();
        } catch (Exception $exception) {
            $photo = null;
        }
    }
@endphp

<label
    class="photo-preview rounded @error($name) is-invalid @enderror"
    for="{{ $name }}"
    @if ($photo) style="background-image: url({{ $photo }})" @endif
>
    <input
        type="file"
        id="{{ $name }}"
        class="d-none"
        accept="image/jpg, image/jpeg, image/png"
        wire:model="{{ $name }}"
    >
    {{ $slot }}
</label>

@error($name)
    <small class="text-danger">{{ $message }}</small>
@enderror
