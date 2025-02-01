<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function create($tabunganId)
    {
        $tabungan = Tabungan::where('id', $tabunganId)->first();
        $transaksis = Transaksi::where('tabungan_id', $tabunganId)->get();

        $transaksiPemasukan = $transaksis->where('jenis', 'pemasukan')->sum('jumlah');
        $transaksiPengeluaran = $transaksis->where('jenis', 'pengeluaran')->sum('jumlah');
        $tabungan->saldo = $transaksiPemasukan - $transaksiPengeluaran;

        return view('transaksis.create', compact('tabungan', 'tabunganId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tabungan_id' => 'required|exists:tabungans,id',
            'jenis' => 'required|in:pemasukan,pengeluaran',
            'jumlah' => 'required|numeric',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $data = [
            'tabungan_id' => $request->tabungan_id,
            'jenis' => $request->jenis,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'user_id' => auth()->id(),
        ];

        Transaksi::create($data);

        return redirect()->route('tabungans.show', $request->tabungan_id);
    }

    public function index()
    {
        $transaksis = Transaksi::with('tabungan')->get();
        return view('transaksis.index', compact('transaksis'));
    }
}
