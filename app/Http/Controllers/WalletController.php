<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;

class WalletController extends Controller
{

    public function index()
    {
        $wallets = Wallet::all();
        $totalPemasukan = $wallets->filter(function ($item) {
            return $item->jenis === 'pemasukan';
        })->sum('jumlah');

        $totalPengeluaran = $wallets->filter(function ($item) {
            return $item->jenis === 'pengeluaran';
        })->sum('jumlah');

        $totalUang = $totalPemasukan - $totalPengeluaran;

        $rataRataPemasukan = $wallets->where('jenis', 'pemasukan')->avg('jumlah');

        $walletNames = ['dana', 'gopay', 'ovo', 'paypal', 'shopeepay', 'seabank'];

        $walletBalances = [];
        
        foreach ($walletNames as $name) {
            $pemasukan = $wallets->where('sumber', $name)->where('jenis', 'pemasukan')->sum('jumlah');
            $pengeluaran = $wallets->where('sumber', $name)->where('jenis', 'pengeluaran')->sum('jumlah');
        
            $walletBalances[$name] = $pemasukan - $pengeluaran;
        }
        
        return view('dashboard', compact('wallets', 'totalPemasukan', 'totalPengeluaran', 'totalUang', 'rataRataPemasukan', 'walletBalances'));
    }

    public function store(Request $request)
    {
        // Hilangkan titik pada jumlah
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

        // Ambil semua data wallet
        $wallets = Wallet::all();

        // Hitung saldo e-wallet saat ini untuk sumber yang dipilih
        $totalPemasukan = $wallets->where('sumber', $validated['sumber'])->where('jenis', 'pemasukan')->sum('jumlah');
        $totalPengeluaran = $wallets->where('sumber', $validated['sumber'])->where('jenis', 'pengeluaran')->sum('jumlah');
        $saldo = $totalPemasukan - $totalPengeluaran;

        // Jika jenis pengeluaran, periksa dulu saldonya
        if ($validated['jenis'] === 'pengeluaran') {
            if ($validated['jumlah'] > $saldo) {
                // Jika saldo tidak cukup, ubah ke pemasukan otomatis
                return redirect()->route('wallet.index')->with('error', 'Saldo tidak cukup!');
            }
        }

        // Simpan ke database
        Wallet::create([
            'jenis'     => $validated['jenis'],
            'kategori'  => $validated['kategori'],
            'jumlah'    => $validated['jumlah'],
            'deskripsi' => $validated['deskripsi'],
            'sumber'    => $validated['sumber'],
            'tanggal'   => now(),
        ]);

        $jumlahFormatted = 'Rp. ' . number_format($validated['jumlah'], 0, ',', '.');


        return redirect()->route('wallet.index')->with(
            'success',
            $validated['jenis'] === 'pengeluaran' ? "Uang $jumlahFormatted berhasil diambil dari {$validated['sumber']}" : "Uang $jumlahFormatted berhasil disimpan ke {$validated['sumber']}"
        );
    }
}
