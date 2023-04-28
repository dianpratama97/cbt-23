<?php

namespace App\Http\Livewire\Soal;

use Livewire\Component;
use App\Models\BankSoal;
use App\Models\Ujian;

class CreateSoal extends Component
{

    public $ujian_id;
    public $soal;
    public $opsi_a;
    public $opsi_b;
    public $opsi_c;
    public $opsi_d;
    public $kunci_jawaban;

    public function render()
    {
        return view('livewire.soal.create-soal', [
            'ujian' => Ujian::get()
        ]);
    }
    public function simpan()
    {

        BankSoal::create([
            'ujian_id' => $this->ujian_id,
            'soal' => $this->soal,
            'opsi_a' => $this->opsi_a,
            'opsi_b' => $this->opsi_b,
            'opsi_c' => $this->opsi_c,
            'opsi_d' => $this->opsi_d,
            'kunci_jawaban' => $this->kunci_jawaban,
        ]);

        $this->resetInput();
        $this->emit('ujianCreated');
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
