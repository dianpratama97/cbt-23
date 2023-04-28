<?php

namespace App\Http\Controllers;

use App\Models\BankSoal;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Ujian;
use Illuminate\Http\Request;

class CbtController extends Controller
{
    public function index()
    {
        return view('ujian.mapelCbt', [
            'ujian' => Ujian::get()
        ]);
    }

    public function soal($idUjian)
    {
        $data = BankSoal::where('ujian_id', $idUjian)->paginate(1);
        $no = BankSoal::where('ujian_id', $idUjian)->get();
        return view('ujian.detail', ['soal' => $data, 'no' => $no]);
    }

    public function store(Request $request, $id)
    {
        dd('cbt');
        //create post
        Nilai::create([
            'user_id'     => 1,
            'ujian_id'     => 2,
            'nilai'     => $request->jawaban,
        ]);
        // return response()->json('status', true);
    }
}
