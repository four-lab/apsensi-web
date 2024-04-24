<div class="d-flex gap-2">
    <button
        class="btn btn-sm btn-success"
        wire:click="edit({{ $sbj->id }})"
        title="Edit"
    >
        <i class="ti ti-pencil"></i>
    </button>
    <button
        class="btn btn-sm btn-danger btn-delete"
        title="Hapus"
        data-id="{{ $sbj->id }}"
    >
        <i class="ti ti-trash"></i>
    </button>
</div>
