<div>
    @if ($eye)
        <span class="btn btn-sm btn-info align-middle">
            <span class="fa fa-eye align-middle"></span> &ensp; Detail Data
        </span>
    @endif

    @if ($edit)
        <span class="btn btn-sm btn-warning align-middle">
            <span class="fa fa-edit align-middle"></span> &ensp; Edit Data
        </span>
    @endif
    
    @if ($undo)
        <span class="btn btn-sm btn-info align-middle">
            <span class="fa fa-undo align-middle"></span> &ensp; Aktifkan Data
        </span>
    @endif

    @if ($times)
        <span class="btn btn-sm btn-danger align-middle">
            <span class="fa fa-times align-middle"></span> &ensp; Non-Aktifkan Data
        </span>
    @endif

    @if ($trash)
        <span class="btn btn-sm btn-danger align-middle">
            <span class="fa fa-trash align-middle"></span> &ensp; Hapus Data
        </span>
    @endif
</div>