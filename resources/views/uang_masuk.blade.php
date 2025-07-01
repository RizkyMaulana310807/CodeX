@extends('layouts.app')
@section('title', 'pemasukan')
@section('content')

    <form action="{{ route('pemasukan.store') }}" method="POST"
        class="relative max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-lg space-y-4">
        @csrf
        <h2 class="text-xl font-bold text-gray-700 mb-4">Catat Aktivitas Keuangan</h2>

        <!-- Grid 2 Kolom -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Jenis -->
            <div x-data="{ jenis: 'pemasukan' }">
                <label class="block text-sm font-medium text-gray-700 mb-1">Jenis</label>
                <div class="flex gap-4">
                    <!-- Pemasukan -->
                    <label :class="jenis === 'pemasukan' ? 'border-blue-600 border-2' : 'border-gray-300 border-2'"
                        class="flex-1 cursor-pointer p-3 rounded-lg flex items-center justify-center gap-2 text-blue-800 bg-white hover:bg-blue-50 transition-all">
                        <input type="radio" name="jenis" value="pemasukan" class="hidden" x-model="jenis">
                        <i class="fa-solid fa-circle-dollar-to-slot text-2xl"></i>
                        <span class="font-semibold">Pemasukan</span>
                    </label>

                    <!-- Pengeluaran -->
                    <label :class="jenis === 'pengeluaran' ? 'border-red-600 border-2' : 'border-gray-300 border-2'"
                        class="flex-1 cursor-pointer p-3 rounded-lg flex items-center justify-center gap-2 text-red-800 bg-white hover:bg-red-50 transition-all">
                        <input type="radio" name="jenis" value="pengeluaran" class="hidden" x-model="jenis">
                        <i class="fa-solid fa-money-bill-trend-up text-2xl"></i>
                        <span class="font-semibold">Pengeluaran</span>
                    </label>
                </div>
            </div>

            <!-- Kategori -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="kategori" id="kategori"
                    class="mt-1 w-full border rounded-lg p-2 focus:outline-none focus:ring focus:border-blue-300" required>
                    <!-- opsi akan diisi secara otomatis -->
                </select>
            </div>

            <!-- Jumlah -->
            <div class="relative col-span-1">
                <label class="block text-sm font-medium text-gray-700">Jumlah</label>
                <input type="text" id="jumlah" name="jumlah"
                    class="mt-1 w-full border rounded-lg p-2 text-right text-lg font-bold bg-gray-100 cursor-pointer"
                    readonly required onclick="toggleKeypad(true)">

                <!-- Keypad (floating) -->
                <div id="keypad" class="hidden absolute z-50 mt-2 bg-white p-3 rounded-lg shadow-xl border w-full">
                    <div class="grid grid-cols-3 gap-2">
                        @foreach (range(1, 9) as $i)
                            <button type="button" onclick="appendAngka('{{ $i }}')"
                                class="bg-gray-200 hover:bg-gray-300 text-xl font-semibold py-2 rounded-lg">{{ $i }}</button>
                        @endforeach
                        <button type="button" onclick="appendAngka('000')"
                            class="bg-gray-200 hover:bg-gray-300 text-xl font-semibold py-2 rounded-lg">000</button>
                        <button type="button" onclick="appendAngka('0')"
                            class="bg-gray-200 hover:bg-gray-300 text-xl font-semibold py-2 rounded-lg">0</button>
                        <button type="button" onclick="hapusAngka()"
                            class="bg-red-500 hover:bg-red-600 text-white text-xl font-semibold py-2 rounded-lg">⌫</button>
                    </div>
                </div>
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <input type="text" name="deskripsi" class="mt-1 w-full border rounded-lg p-2" placeholder="(Opsional)">
            </div>

            <!-- Sumber (sendiri dalam satu baris) -->
            <div x-data="{ sumber: '' }" class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Sumber</label>
                <div class="grid grid-cols-3 gap-4">
                    <!-- DANA -->
                    <label :class="sumber === 'dana' ? 'border-blue-500 border-2' : 'border border-gray-300'"
                        class="cursor-pointer p-2 rounded-lg bg-white hover:bg-blue-50 transition-all flex flex-col items-center justify-center h-[140px]">
                        <input type="radio" name="sumber" value="dana" class="hidden" x-model="sumber">
                        <img src="/images/dana-e-wallet-logo.png" alt="DANA"
                            class="w-[100px] h-[100px] object-contain aspect-square">
                        <span class="mt-1 text-sm">Dana</span>
                    </label>

                    <!-- GoPay -->
                    <label :class="sumber === 'gopay' ? 'border-blue-500 border-2' : 'border border-gray-300'"
                        class="cursor-pointer p-2 rounded-lg bg-white hover:bg-blue-50 transition-all flex flex-col items-center justify-center h-[140px]">
                        <input type="radio" name="sumber" value="gopay" class="hidden" x-model="sumber">
                        <img src="/images/gopay-e-wallet.png" alt="GoPay"
                            class="w-[100px] h-[100px] object-contain aspect-square">
                        <span class="mt-1 text-sm">GoPay</span>
                    </label>

                    <!-- OVO -->
                    <label :class="sumber === 'ovo' ? 'border-blue-500 border-2' : 'border border-gray-300'"
                        class="cursor-pointer p-2 rounded-lg bg-white hover:bg-blue-50 transition-all flex flex-col items-center justify-center h-[140px]">
                        <input type="radio" name="sumber" value="ovo" class="hidden" x-model="sumber">
                        <img src="/images/ovo-e-wallet.png" alt="OVO"
                            class="w-[100px] h-[100px] object-contain aspect-square">
                        <span class="mt-1 text-sm">Ovo</span>
                    </label>

                    <!-- PayPal -->
                    <label :class="sumber === 'paypal' ? 'border-blue-500 border-2' : 'border border-gray-300'"
                        class="cursor-pointer p-2 rounded-lg bg-white hover:bg-blue-50 transition-all flex flex-col items-center justify-center h-[140px]">
                        <input type="radio" name="sumber" value="paypal" class="hidden" x-model="sumber">
                        <img src="/images/paypal-e-wallet.png" alt="PayPal"
                            class="w-[100px] h-[100px] object-contain aspect-square">
                        <span class="mt-1 text-sm">Paypal</span>
                    </label>

                    <!-- ShopeePay -->
                    <label :class="sumber === 'shopeepay' ? 'border-blue-500 border-2' : 'border border-gray-300'"
                        class="cursor-pointer p-2 rounded-lg bg-white hover:bg-blue-50 transition-all flex flex-col items-center justify-center h-[140px]">
                        <input type="radio" name="sumber" value="shopeepay" class="hidden" x-model="sumber">
                        <img src="/images/s-pay-e-wallet.png" alt="ShopeePay"
                            class="w-[100px] h-[100px] object-contain aspect-square">
                        <span class="mt-1 text-sm">ShopeePay</span>
                    </label>

                    <!-- SeaBank -->
                    <label :class="sumber === 'seabank' ? 'border-blue-500 border-2' : 'border border-gray-300'"
                        class="cursor-pointer p-2 rounded-lg bg-white hover:bg-blue-50 transition-all flex flex-col items-center justify-center h-[140px]">
                        <input type="radio" name="sumber" value="seabank" class="hidden" x-model="sumber">
                        <img src="/images/sea-bank-e-wallet.png" alt="SeaBank"
                            class="w-[100px] h-[100px] object-contain aspect-square">
                        <span class="mt-1 text-sm">Seabank</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Tombol Submit -->
        <div class="pt-4">
            <button type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                Simpan Transaksi
            </button>
        </div>
        <script>
            const kategoriSelect = document.getElementById("kategori");

            const kategoriData = {
                pemasukan: [{
                        value: "gaji",
                        label: "Gaji"
                    },
                    {
                        value: "freelance",
                        label: "Freelance"
                    },
                    {
                        value: "investasi",
                        label: "Investasi"
                    },
                    {
                        value: "lainnya",
                        label: "Lainnya"
                    }
                ],
                pengeluaran: [{
                        value: "makan",
                        label: "Makan"
                    },
                    {
                        value: "belanja",
                        label: "Belanja"
                    },
                    {
                        value: "transport",
                        label: "Transport"
                    },
                    {
                        value: "hiburan",
                        label: "Hiburan"
                    },
                    {
                        value: "tagihan",
                        label: "Tagihan"
                    },
                    {
                        value: "lainnya",
                        label: "Lainnya"
                    }
                ]
            };

            function isiKategori(jenis) {
                // Kosongkan dulu opsi
                kategoriSelect.innerHTML = "";

                // Tambah opsi berdasarkan jenis
                kategoriData[jenis].forEach(item => {
                    const option = document.createElement("option");
                    option.value = item.value;
                    option.textContent = item.label;
                    kategoriSelect.appendChild(option);
                });
            }

            // Jalankan saat DOM sudah siap
            document.addEventListener("DOMContentLoaded", function() {
                const jenisInput = document.querySelectorAll("input[name='jenis']");
                let jenisAktif = Array.from(jenisInput).find(r => r.checked)?.value || 'pemasukan';
                isiKategori(jenisAktif);

                // Saat jenis berubah
                jenisInput.forEach(radio => {
                    radio.addEventListener("change", function() {
                        if (this.checked) {
                            isiKategori(this.value);
                        }
                    });
                });
            });
        </script>

    </form>

    <script>
        function appendAngka(angka) {
            const input = document.getElementById('jumlah');

            // Hapus titik sebelum menambahkan angka baru
            const raw = input.value.replace(/\./g, '') + angka;

            // Format ulang dengan titik ribuan
            input.value = formatRibuan(raw);
        }

        function hapusAngka() {
            const input = document.getElementById('jumlah');

            // Hapus titik → hapus 1 digit terakhir → format ulang
            const raw = input.value.replace(/\./g, '').slice(0, -1);

            input.value = formatRibuan(raw);
        }

        function formatRibuan(angka) {
            if (!angka) return '';
            return new Intl.NumberFormat('id-ID').format(angka);
        }

        function toggleKeypad(show) {
            const keypad = document.getElementById('keypad');
            keypad.classList.toggle('hidden', !show);
        }

        document.addEventListener('click', function(event) {
            const jumlahInput = document.getElementById('jumlah');
            const keypad = document.getElementById('keypad');
            if (!jumlahInput.contains(event.target) && !keypad.contains(event.target)) {
                toggleKeypad(false);
            }
        });
    </script>

@endsection
