<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use Carbon\Carbon;
class WebController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function home()
    {
        return view('home');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function analytic()
    {
        $wallets = Wallet::all()->map(function ($item) {
            $item->formatted_date = Carbon::parse($item->created_at)->translatedFormat('F') . ' - ' . Carbon::parse($item->created_at)->format('d');
            return $item;
        });
    
        return view('analytic', compact('wallets'));
    }
    public function worker()
    {
        return view('dashboard');
    }
    public function pemasukan()
    {
        $wallets = Wallet::all();

        // Hitung saldo masing-masing wallet
        $saldoWallets = [
            'danaWallet' => $wallets->where('sumber', 'dana')->where('jenis', 'pemasukan')->sum('jumlah')
                - $wallets->where('sumber', 'dana')->where('jenis', 'pengeluaran')->sum('jumlah'),

            'gopayWallet' => $wallets->where('sumber', 'gopay')->where('jenis', 'pemasukan')->sum('jumlah')
                - $wallets->where('sumber', 'gopay')->where('jenis', 'pengeluaran')->sum('jumlah'),

            'ovoWallet' => $wallets->where('sumber', 'ovo')->where('jenis', 'pemasukan')->sum('jumlah')
                - $wallets->where('sumber', 'ovo')->where('jenis', 'pengeluaran')->sum('jumlah'),

            'paypalWallet' => $wallets->where('sumber', 'paypal')->where('jenis', 'pemasukan')->sum('jumlah')
                - $wallets->where('sumber', 'paypal')->where('jenis', 'pengeluaran')->sum('jumlah'),

            'spayWallet' => $wallets->where('sumber', 'shopeepay')->where('jenis', 'pemasukan')->sum('jumlah')
                - $wallets->where('sumber', 'shopeepay')->where('jenis', 'pengeluaran')->sum('jumlah'),

            'seabankWallet' => $wallets->where('sumber', 'seabank')->where('jenis', 'pemasukan')->sum('jumlah')
                - $wallets->where('sumber', 'seabank')->where('jenis', 'pengeluaran')->sum('jumlah'),
        ];

        return view('uang_masuk', compact('saldoWallets'));
    }
}
