<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    // -------------------------------
    // INDEX
    // -------------------------------
    public function index()
    {
        $artikel = Article::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.artikel.index', compact('artikel'));
    }

    // -------------------------------
    // CREATE
    // -------------------------------
    public function create()
    {
        $categories = Category::all(); // ambil semua kategori
        return view('admin.artikel.create', compact('categories'));
    }

    // -------------------------------
    // STORE
    // -------------------------------
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi_singkat' => 'required',
            'konten' => 'required',
            'kategori' => 'required',
            'author' => 'required',
            'thumbnail' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // upload thumbnail ke /public/uploads/artikel/
        $file = $request->file('thumbnail');
        $filename = time() . '-' . $file->getClientOriginalName();
        $directory = 'uploads/artikel/';
        $file->move(public_path($directory), $filename);

        Article::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'konten' => $request->konten,
            'author' => $request->author,
            'kategori' => $request->kategori,
            'thumbnail_path' => $directory . $filename,
            'is_published' => $request->is_published ? 1 : 0,
        ]);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dibuat!');
    }

    // -------------------------------
    // SHOW
    // -------------------------------
    public function show(string $id)
    {
        $artikel = Article::findOrFail($id);
        return view('admin.artikel.show', compact('artikel'));
    }

    // -------------------------------
    // EDIT
    // -------------------------------
    public function edit($id)
    {
        $artikel = Article::findOrFail($id);
        $categories = Category::all();
        return view('admin.artikel.edit', compact('artikel', 'categories'));
    }

    // -------------------------------
    // UPDATE
    // -------------------------------
    public function update(Request $request, string $id)
    {
        $artikel = Article::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'deskripsi_singkat' => 'required',
            'konten' => 'required',
            'kategori' => 'required',
            'author' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'is_published' => 'required',
        ]);

        // Jika ada thumbnail baru, upload dan ganti yang lama
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '-' . $file->getClientOriginalName();
            $directory = 'uploads/artikel/';
            $file->move(public_path($directory), $filename);

            // Hapus file lama jika ingin, opsional
            if ($artikel->thumbnail_path && file_exists(public_path($artikel->thumbnail_path))) {
                unlink(public_path($artikel->thumbnail_path));
            }

            $artikel->thumbnail_path = $directory . $filename;
        }

        // Update field lain
        $artikel->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'konten' => $request->konten,
            'kategori' => $request->kategori,
            'author' => $request->author,
            'is_published' => $request->is_published ? 1 : 0,
        ]);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    // -------------------------------
    // DESTROY
    // -------------------------------
    public function destroy(string $id)
    {
        $artikel = Article::findOrFail($id);

        if ($artikel->thumbnail_path && file_exists(public_path($artikel->thumbnail_path))) {
            unlink(public_path($artikel->thumbnail_path));
        }

        $artikel->delete();

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus!');
    }
}
