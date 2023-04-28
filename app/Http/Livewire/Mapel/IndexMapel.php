<?php

namespace App\Http\Livewire\Mapel;

use App\Models\Mapel;
use Livewire\Component;

class IndexMapel extends Component
{

    public $statusUpdate = false; //panggil form update
    public $name;
    public $idHapus;

    protected $listeners = [
        'mapelCreated' => '$refresh',
        'mapelUpdate' => 'handleUpdate',
    ];

    public function render()
    {
        return view('livewire.mapel.index-mapel', [
            'data' => Mapel::get()
        ]);
    }

    //tampilkan form update dari UpdateMapel
    public function getMapel($id)
    {
        $this->statusUpdate = true;

        $mapel = Mapel::find($id);
        $this->emit('getMapel', $mapel); //kirim data
    }

    //sesudah update tutup form
    public function handleUpdate()
    {
        $this->statusUpdate = false;
    }

    public function hapusKonfirmasi($idHapus)
    {
        $this->idHapus = $idHapus;
        $this->dispatchBrowserEvent('modal-deleteConfirm');
    }

    public function hapus($id)
    {
        Mapel::destroy($id);
        $this->dispatchBrowserEvent('modal-delete');
        session()->flash('pesan', 'Data Agama Berhasil di Hapus.');
    }
}
