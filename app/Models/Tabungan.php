<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    protected $fillable = ['nama', 'deskripsi'];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function saldo()
    {
        // Menghitung total pemasukan
        $pemasukan = $this->transaksis()->where('jenis', 'pemasukan')->sum('jumlah');

        // Menghitung total pengeluaran
        $pengeluaran = $this->transaksis()->where('jenis', 'pengeluaran')->sum('jumlah');

        // Saldo = Pemasukan - Pengeluaran
        return [
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,
            'total' => $pemasukan - $pengeluaran
        ];
    }
}
