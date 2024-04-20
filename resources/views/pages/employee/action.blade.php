<div class="d-flex gap-2">
    <button
        class="btn btn-sm btn-success"
        wire:click="edit({{ $emp->id }})"
        title="Edit"
    >
        <i class="ti ti-pencil"></i>
    </button>
    <button
        class="btn btn-sm btn-danger"
        title="Hapus"
    >
        <i class="ti ti-trash"></i>
    </button>
</div>
