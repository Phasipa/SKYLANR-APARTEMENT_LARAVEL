<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class WelcomeController extends Controller
{
    use ValidatesRequests;
    public function index()
    {
        $catalog = Catalog::all();

        return view('welcome', compact('catalog'));
    }
    public function CreateTransaction(Request $request)
    {
        
        $test=$this->validate($request, [
            'id_catalog' => 'required|integer',
            'detail-harga' => 'required',
            'detail-nama' => 'required',
            'detail-nomor' => 'required',
            'detail-alamat' => 'required',
            'status' => 'required',
        ]);
        Transaction::create([
            'nama' => $request->input('detail-nama'),
            'nomorhp' => $request->input('detail-nomor'),
            'alamat' => $request->input('detail-alamat'),
            'catalog_id' => $request->input('id_catalog'),
            'harga' => $request->input('detail-harga'),
            'status' => $request->input('status'),
        ]);
        return redirect('/');
    }
}
