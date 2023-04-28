<?php

namespace App\Http\Livewire\Mapel;

use App\Models\Mapel;
use Livewire\Component;

class UpdateMapel extends Component
{
    public $name;
    public $mapelId;

    protected $listeners = [
        'getMapel' => 'showMapel',
    ];
    
    public function render()
    {
        return view('livewire.mapel.update-mapel', [
            'data' => Mapel::orderBy('id', 'asc')->get(),
        ]);
    }

    //ambil data dan tampilkan di view
    public function showMapel($mapel)
    {
        $this->name = $mapel['name'];
        $this->mapelId = $mapel['id'];
    }

    public function update($mapelId)
    {
        $data = Mapel::find($this->mapelId);
        $data->update([
            'name' => $this->name
        ]);
    
        $this->resetInput();
        $this->emit('mapelUpdate');
    }

    private function resetInput()
    {
        $this->name = null;
        $this->mapelId = null;
    }
}
