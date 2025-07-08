@extends('layouts.app')

@section('title', 'CodeX Manager')

@section('content')
<div class="max-w-6xl mx-auto mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
    {{-- === Form Tambah Link Redirect === --}}
    <div class="bg-white p-6 rounded-xl shadow">
        <h1 class="text-2xl font-bold mb-4">Tambah Link Redirect</h1>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('links.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="code" class="block font-medium text-sm text-gray-700">Kode</label>
                <div class="flex items-center mt-1 gap-2">
                    <input type="text" name="code" id="code" class="flex-1 border-gray-300 rounded-md shadow-sm" required>
                    <button type="button" onclick="generateCode()" class="px-3 py-1 text-sm bg-gray-200 hover:bg-gray-300 rounded">Generate</button>
                    <button type="button" onclick="startAutoGenerate()" id="autoBtn" class="px-3 py-1 text-sm bg-blue-200 hover:bg-blue-300 rounded">Auto</button>
                </div>
            </div>

            <div>
                <label for="route" class="block font-medium text-sm text-gray-700">Pilih Route</label>
                <select name="route" id="route" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="">-- Pilih Route --</option>
                    @foreach ($routes as $route)
                        <option value="{{ $route['name'] }}">{{ $route['name'] }} ({{ $route['uri'] }})</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="kategori_id" class="block font-medium text-sm text-gray-700">Kategori</label>
                <select name="kategori_id" id="kategori_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="">-- Pilih kategori --</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="pt-4">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Simpan</button>
            </div>
        </form>
    </div>

    {{-- === Form Tambah Kategori Baru === --}}
    <div class="bg-white p-6 rounded-xl shadow">
        <h1 class="text-2xl font-bold mb-4">Tambah Kategori</h1>

        @if (session('kategori_success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('kategori_success') }}
            </div>
        @endif

        <form action="{{ route('kategori.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="nama" class="block font-medium text-sm text-gray-700">Nama Kategori</label>
                <input type="text" name="nama" id="nama" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="pt-4">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">Tambah</button>
            </div>
        </form>
    </div>
</div>

<script>
    const charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()';
    let autoInterval = null;

    function generateCode() {
        let code = '';
        for (let i = 0; i < 16; i++) {
            const randomIndex = Math.floor(Math.random() * charset.length);
            code += charset[randomIndex];
        }
        document.getElementById('code').value = code;
    }

    function startAutoGenerate() {
        const btn = document.getElementById('autoBtn');
        if (autoInterval) {
            clearInterval(autoInterval);
            autoInterval = null;
            btn.textContent = 'Auto';
        } else {
            generateCode();
            autoInterval = setInterval(generateCode, 200);
            btn.textContent = 'Stop';
        }
    }
</script>
@endsection
