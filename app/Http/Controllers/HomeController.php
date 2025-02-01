<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $tabungans = Tabungan::select('id', 'nama', 'deskripsi')->get()
        ->map(function ($tabungan) {
            $tabungan->saldo = $tabungan->saldo()['total'];
            $tabungan->pengeluaran = $tabungan->saldo()['pengeluaran'];
            $tabungan->pemasukan = $tabungan->saldo()['pemasukan'];
            return $tabungan;
        });

        $totalSaldo = $tabungans->sum('saldo');
        $totalPemasukan = $tabungans->sum('pemasukan');
        $totalPengeluaran = $tabungans->sum('pengeluaran');


        $transaksis = Transaksi::with('user:id,name')
            ->with('tabungan:id,nama')
            ->orderBy('created_at', 'desc')
            ->paginate(10) 
            ->through(function ($transaksi) {
                $transaksi->user = $transaksi->user->name;
                $transaksi->tabungan = $transaksi->tabungan->nama;
                return $transaksi;
            });

        return view('dashboard', compact('totalSaldo', 'totalPemasukan', 'totalPengeluaran', 'tabungans', 'transaksis'));
    }
}
