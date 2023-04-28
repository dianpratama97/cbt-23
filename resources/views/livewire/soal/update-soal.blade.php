<div>
    <div class="container">
        <div class="card mt-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ujian_id">Ujian</label>
                            <select class="form-control" id="ujian_id" wire:model="ujian_id">
                                <option value="">--pilih--</option>
                                @foreach ($ujian as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kunci_jawaban">Kunci Jawaban</label>
                            <select class="form-control" id="kunci_jawaban" wire:model="kunci_jawaban">
                                <option value="">--pilih--</option>
                                <option value="a">a</option>
                                <option value="b">b</option>
                                <option value="c">c</option>
                                <option value="d">d</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="soal">Soal</label>
                            <textarea class="form-control" id="soal" wire:model="soal" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="opsi_a">Opsi A</label>
                            <textarea class="form-control" id="opsi_a" wire:model="opsi_a" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="opsi_b">Opsi B</label>
                            <textarea class="form-control" id="opsi_b" wire:model="opsi_b" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="opsi_c">Opsi C</label>
                            <textarea class="form-control" id="opsi_c" wire:model="opsi_c" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="opsi_d">Opsi D</label>
                            <textarea class="form-control" id="opsi_d" wire:model="opsi_d" rows="2"></textarea>
                        </div>
                    </div>
                </div>

                <button wire:click='update({{ $soalId }})' class="btn btn-sm btn-primary">update</button>
            </div>
        </div>
    </div>
</div>
