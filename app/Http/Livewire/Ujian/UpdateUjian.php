<?php

namespace App\Http\Livewire\Ujian;

use App\Models\Mapel;
use App\Models\Ujian;
use Livewire\Component;

class UpdateUjian extends Component
{

    public $name;
    public $ujianId;
    public $mapel_id;
    public $waktu;

    protected $listeners = [
        'getDataById' => 'showMapel',
    ];

    public function render()
    {
        return view('livewire.ujian.update-ujian', [
            'mapel' => Mapel::get()
        ]);
    }

    //ambil data dan tampilkan di view
    public function showMapel($mapel)
    {
        $this->name = $mapel['name'];
        $this->waktu = $mapel['waktu'];
        $this->mapel_id = $mapel['mapel_id'];
        $this->ujianId = $mapel['id'];
    }

    public function update($ujianId)
    {
        $data = Ujian::find($this->ujianId);
        $data->update([
            'name' => $this->name,
            'waktu' => $this->waktu,
            'mapel_id' => $this->mapel_id,
        ]);

        $this->resetInput();
        $this->emit('ujianUpdate');
    }

    private function resetInput()
    {
        $this->name = null;
        $this->ujianId = null;
        $this->waktu = null;
    }
}
