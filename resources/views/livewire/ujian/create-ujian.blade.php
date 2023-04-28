<div>

    <div class="container">
        <div class="card mt-4">
            <div class="card-body">
                <div class="row ">
                    <div class="col">
                        <select class="form-control" wire:model="mapel_id">
                            <option>--MAPEL--</option>
                            @foreach ($mapel as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" wire:model="name" class="form-control" placeholder="Nama Ujian">
                    </div>
                    <div class="col">
                        <input type="number" wire:model="waktu" class="form-control" placeholder="Waktu">
                    </div>
                </div>
                <button wire:click='simpan' class="btn btn-sm btn-primary mt-3">simpan</button>
            </div>
        </div>
    </div>
</div>