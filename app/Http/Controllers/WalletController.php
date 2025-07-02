<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;

class WalletController extends Controller
{

    public function store(Request $request)
    {
        $request->merge([
            'jumlah' => str_replace('.', '', $request->jumlah)
        ]);

        // Validasi input
        $validated = $request->validate([
            'jenis'     => 'required|in:pemasukan,pengeluaran',
            'kategori'  => 'required|string|max:50',
            'jumlah'    => 'required|numeric|min:1',
            'deskripsi' => 'nullable|string|max:255',
            'sumber'    => 'required|string|max:50',
        ]);

        // Simpan data ke database
        Wallet::create([
            'jenis'     => $validated['jenis'],
            'kategori'  => $validated['kategori'],
            'jumlah'    => $validated['jumlah'],
            'deskripsi' => $validated['deskripsi'],
            'sumber'    => $validated['sumber'],
            'tanggal'   => now(),
        ]);

        return redirect()->route('wallet.index')->with('success', 'Wallet berhasil disimpan.');
    }
}
