<?php

namespace App\Http\Livewire\Ujian;

use App\Models\Mapel;
use App\Models\Ujian;
use Livewire\Component;

class IndexUjian extends Component
{
    public $statusUpdate = false; //panggil form update
    public $idHapus;

    protected $listeners = [
        'ujianCreated' => '$refresh',
        'ujianUpdate' => 'handleUpdate',
    ];

    public function render()
    {
        return view('livewire.ujian.index-ujian', [
            'data' => Ujian::get()
        ]);
    }

    //tampilkan form update dari UpdateMapel
    public function getDataById($id)
    {
        $this->statusUpdate = true;

        $ujian = Ujian::find($id);
        $this->emit('getDataById', $ujian); //kirim data
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
        Ujian::destroy($id);
        $this->dispatchBrowserEvent('modal-delete');
        session()->flash('pesan', 'Data Agama Berhasil di Hapus.');
    }
}
