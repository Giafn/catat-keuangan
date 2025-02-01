<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TabunganController extends Controller
{
    public function index()
    {
        $tabungans = Tabungan::paginate(10)
        ->through(function ($tabungan) {
            $tabungan->saldo = $tabungan->saldo()['total'];
            return $tabungan;
        });
        
        return view('tabungans.index', compact('tabungans'));
    }

    public function create()
    {
        return view('tabungans.create');
    }

    // show 
    public function show($id)
    {
        $tabungan = Tabungan::where('id', $id)->first();
        if (!$tabungan) {
            return abort(404);
        }

        $tabungan->saldo = $tabungan->saldo()['total'];
        $tabungan->pengeluaran = $tabungan->saldo()['pengeluaran'];
        $tabungan->pemasukan = $tabungan->saldo()['pemasukan'];

        $transaksis = Transaksi::where('tabungan_id', $id)
            ->with('user:id,name')
            ->orderBy('created_at', 'desc')
            ->paginate(10)  // Ganti angka 10 dengan jumlah data per halaman yang diinginkan
            ->through(function ($transaksi) {
                $transaksi->user = $transaksi->user->name;
                return $transaksi;
            });

        return view('tabungans.show', compact('tabungan', 'transaksis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Tabungan::create($request->all());

        return redirect()->route('tabungans.index');
    }

    public function edit($id)
    {
        $tabungan = Tabungan::where('id', $id)->first();
        if (!$tabungan) {
            return abort(404);
        }
        return view('tabungans.edit', compact('tabungan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $tabungan = Tabungan::where('id', $id)->first();
        if (!$tabungan) {
            return abort(404);
        }
        $tabungan->update($request->all());

        return redirect()->route('tabungans.edit', ['id' => $tabungan->id]);
    }

    public function destroy($id)
    {
        $tabungan = Tabungan::where('id', $id)->first();
        if (!$tabungan) {
            return abort(404);
        }
        try {
            DB::beginTransaction();
            $tabungan->transaksis()->delete();
            $tabungan->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('tabungans.index')->with('error', 'Tabungan gagal dihapus karena terdapat transaksi yang terkait');
        }

        return redirect()->route('tabungans.index');
    }
}
