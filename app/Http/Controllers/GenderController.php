<?php

namespace App\Http\Controllers;
use App\Models\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    public function admin()
    {
       $gender = Gender::orderBy('tahun', 'ASC')->get();
        return view('admin.gender.index', compact('gender'));
    }
    public function show()
    {
        // Ambil semua data dari table gender
    $gender = Gender::orderBy('tahun', 'ASC')->get();

    // Kirim ke view
    return view('admin.gender.index', compact('gender'));
    }
     public function create(){
        return view('admin.gender.create');
    }

     public function edit($id){
       $gender = Gender::findOrFail($id);
        return view('admin.gender.edit', compact('gender'));

    }

    public function destroy($id)
    {
    Gender::destroy($id);
    return redirect()->route('admin.gender.index')->with('success', 'Data berhasil dihapus!');
    }


    public function store(Request $request)
    {
    $request->validate([
        'tahun' => 'required |integer|digits:4|after_or_equal:2000|max:2099',
        'laki' => 'required |numeric|min:0.1',
        'perempuan' => 'required|numeric|min:0.1',

    ]);

    Gender::create([
        'tahun' => $request->tahun,
        'laki' => $request->laki,
        'perempuan' => $request->perempuan,

    ]);

    return redirect()->route('admin.gender.index')->with('success', "Data berhasil ditambahkan!");
    }

    public function update(Request $request, $id){
        $request->validate([
        'tahun' => 'required|integer|integer|digits:4|after_or_equal:2000|max:2099',
        'laki' => 'required|numeric|min:0.1|max:100',
        'perempuan' => 'required|numeric|min:0.1|max:100',

    ]);

      $gender = Gender::findOrFail($id);

    $gender->update([
       'tahun' => $request->tahun,
        'laki' => $request->laki,
        'perempuan' => $request->perempuan,

    ]);

    return redirect()->route('admin.gender.index')->with('success', 'Jenis Kelamin berhasil diperbarui!');
    }

}
