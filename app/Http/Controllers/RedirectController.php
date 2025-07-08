<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\links;
use App\Models\category_link;

class RedirectController extends Controller
{
    public function index()
    {
        return view('redirect');
    }
    public function failed()
    {
        return view('redirectfailed');
    }
    public function create()
    {
        $routes = collect(Route::getRoutes())
            ->filter(fn($r) => $r->getName()) // hanya route yang punya nama
            ->map(fn($r) => [
                'name' => $r->getName(),
                'uri' => $r->uri(),
            ])
            ->values();
        $kategoris = category_link::all();

        return view('createlink', compact('routes', 'kategoris'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|unique:links,code',
            'route' => 'required|string|exists:routes,name', // optional stricter validation
            'kategori' => 'required|string',
        ]);

        links::create($request->only('code', 'route', 'kategori'));

        return redirect()->route('links.create')->with('success', 'Link berhasil ditambahkan!');
    }
    public function kategori_store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:category_link,nama',
        ]);

        category_link::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('redirect.create');
    }
}
