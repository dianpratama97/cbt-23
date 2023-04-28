<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankSoal extends Model
{
    use HasFactory;
    protected $table = 'bank_soal';
    protected $guarded = [];

    public function ujian()
    {
        return $this->belongsTo(Ujian::class);
    }
}
