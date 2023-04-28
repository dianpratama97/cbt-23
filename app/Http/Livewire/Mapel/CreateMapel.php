<?php

namespace App\Http\Livewire\Mapel;

use App\Models\Mapel;
use Livewire\Component;

class CreateMapel extends Component
{
    public $name;
    public function render()
    {
        return view('livewire.mapel.create-mapel');
    }

    public function simpan()
    {
        
        Mapel::create([
            'name' => $this->name
        ]);

        $this->resetInput();
        $this->emit('mapelCreated');
    }

    private function resetInput()
    {
        $this->name = null;
    }
}
