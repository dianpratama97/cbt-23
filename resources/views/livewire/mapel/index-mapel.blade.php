<div>

    @if ($statusUpdate == true)
        <livewire:mapel.update-mapel>
        @else
            <livewire:mapel.create-mapel>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <button wire:click='getMapel({{ $item->id }})'
                                            class="btn btn-sm btn-warning">Edit</button>
                                        <button wire:click.prevent="hapusKonfirmasi({{ $item->id }})"
                                            class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#delete">Hapus</button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-dismiss='modal-delete'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda Yakin ?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button wire:click="hapus({{ $idHapus }})" class="btn btn-primary">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('modal-delete', event => {
            $("#delete").modal('hide');
        })
    </script>
</div>
