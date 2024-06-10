<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CatalogController extends Controller
{
    public function index()
    {
        $catalog = Catalog::all();
        return view('catalog.catalog', compact('catalog'));
    }

    public function create()
    {
        return view('catalog.catalog-entry');
    }

    public function store(Request $request)
    {
       $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|file|mimes:png,jpg,jpeg|max:2048',
        ]);

        $gambar = $request->file('gambar');
        $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
        $tujuan_upload = 'img_catalog';
        $gambar->move($tujuan_upload, $nama_gambar);

        Catalog::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar' => $nama_gambar,
        ]);

        return redirect('/catalog');
    }

    public function edit($id_catalog)
    {
        $catalog = Catalog::find($id_catalog);
        return view('catalog.catalog-edit', compact('catalog'));
    }

    public function update(Request $request, $id_catalog)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'file|mimes:png,jpg,jpeg|max:2048',
        ]);

        $catalog = Catalog::find($id_catalog);

        if($request->hasFile('gambar')){

            File::delete('img_catalog/'.$catalog->gambar);
            $gambar = $request->file('gambar');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            $tujuan_upload = 'img_catalog';
            $gambar->move($tujuan_upload, $nama_gambar);
            $catalog->gambar = $nama_gambar;
        }

        $catalog->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/catalog');
    }

    public function delete($id_catalog)
    {
        $catalog = Catalog::find($id_catalog);
        return view('catalog.catalog-hapus', compact('catalog'));
    }

    public function destroy($id_catalog)
    {
        $catalog = Catalog::find($id_catalog);
        File::delete('img_catalog/'.$catalog->gambar);
        $catalog->delete();
        return redirect('/Catalog');
    }

}
