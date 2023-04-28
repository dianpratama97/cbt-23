<?php

namespace App\Http\Livewire\Soal;

use Livewire\Component;
use App\Models\BankSoal;

class IndexSoal extends Component
{
    

    public $statusUpdate = false; //panggil form update
    public $idHapus;

    protected $listeners = [
        'ujianCreated' => '$refresh',
        'soalUpdate' => 'handleUpdate',
    ];

    public function render()
    {
        return view('livewire.soal.index-soal',[
            'data' => BankSoal::all()
        ]);
    }

    //tampilkan form update dari UpdateMapel
    public function getDataById($id)
    {
        $this->statusUpdate = true;

        $soal = BankSoal::find($id);
        $this->emit('getDataById', $soal); //kirim data
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
        BankSoal::destroy($id);
        $this->dispatchBrowserEvent('modal-delete');
        session()->flash('pesan', 'Data Agama Berhasil di Hapus.');
    }
}
