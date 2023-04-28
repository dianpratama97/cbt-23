<?php

namespace App\Http\Livewire\Ujian;

use App\Models\Mapel;
use App\Models\Ujian;
use Livewire\Component;

class CreateUjian extends Component
{
    public $mapel_id;
    public $name;
    public $waktu;
    public function render()
    {
        return view('livewire.ujian.create-ujian', [
            'mapel' => Mapel::get()
        ]);
    }
    public function simpan()
    {

        Ujian::create([
            'mapel_id' => $this->mapel_id,
            'name' => $this->name,
            'waktu' => $this->waktu,
        ]);

        $this->resetInput();
        $this->emit('ujianCreated');
    }

    private function resetInput()
    {
        $this->name = null;
        $this->mapel_id = null;
        $this->waktu = null;
    }
}
