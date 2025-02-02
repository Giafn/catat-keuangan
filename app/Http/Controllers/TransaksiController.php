<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        try {
            DB::beginTransaction();
            Transaksi::create($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan');
        }

        return redirect()->route('tabungans.show', $request->tabungan_id);
    }

    // edit dan update
    public function show($id)
    {
        $transaksi = Transaksi::where('id', $id)
            ->with(
                'tabungan:id,nama',
            )->select('id', 'tabungan_id', 'jenis', 'jumlah', 'tanggal', 'keterangan')
            ->first();
        if (!$transaksi) {
            return abort(404);
        }
        $transaksi->nama_tabungan = $transaksi->tabungan->nama;
        $tabungan = Tabungan::where('id', $transaksi->tabungan_id)->first();
        $transaksi->saldo_tabungan = $tabungan->saldo()['total'];

        return view('transaksis.show', compact('transaksi'));
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::where('id', $id)->first();
        if (!$transaksi) {
            return abort(404);
        }
        
        $tabunganId = $transaksi->tabungan_id;
        try {
            DB::beginTransaction();
            $transaksi->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('tabungans.show', $tabunganId)->with('error', 'Transaksi gagal dihapus');
        }

        return redirect()->route('tabungans.show', $tabunganId)->with('success', 'Transaksi berhasil dihapus');
    }

    public function index()
    {
        $transaksis = Transaksi::with('tabungan')->get();
        return view('transaksis.index', compact('transaksis'));
    }
}
