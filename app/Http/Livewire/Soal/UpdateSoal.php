<?php

namespace App\Http\Livewire\Soal;

use App\Models\BankSoal;
use App\Models\Ujian;
use Livewire\Component;

class UpdateSoal extends Component
{

    public $soalId;
    public $ujian_id;
    public $soal;
    public $opsi_a;
    public $opsi_b;
    public $opsi_c;
    public $opsi_d;
    public $kunci_jawaban;


    protected $listeners = [
        'getDataById' => 'showSoal',
    ];

    public function render()
    {
        return view('livewire.soal.update-soal', [
            'ujian' =>  Ujian::get()
        ]);
    }


    //ambil data dan tampilkan di view
    public function showSoal($soal)
    {
        $this->soal = $soal['soal'];
        $this->kunci_jawaban = $soal['kunci_jawaban'];
        $this->ujian_id = $soal['ujian_id'];
        $this->opsi_a = $soal['opsi_a'];
        $this->opsi_b = $soal['opsi_b'];
        $this->opsi_c = $soal['opsi_c'];
        $this->opsi_d = $soal['opsi_d'];
        $this->soalId = $soal['id'];
    }

    public function update($soalId)
    {
       
        $data = BankSoal::find($this->soalId);
        $data->update([
            'ujian_id' => $this->ujian_id,
            'soal' => $this->soal,
            'opsi_a' => $this->opsi_a,
            'opsi_b' => $this->opsi_b,
            'opsi_c' => $this->opsi_c,
            'opsi_d' => $this->opsi_d,
            'kunci_jawaban' => $this->kunci_jawaban,
        ]);

        $this->resetInput();
        $this->emit('soalUpdate');
    }

    private function resetInput()
    {
        $this->ujian_id = null;
        $this->soal = null;
        $this->opsi_a = null;
        $this->opsi_b = null;
        $this->opsi_c = null;
        $this->opsi_d = null;
        $this->kunci_jawaban = null;
    }
}
