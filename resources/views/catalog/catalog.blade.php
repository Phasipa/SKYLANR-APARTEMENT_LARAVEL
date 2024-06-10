@extends('layouts.app')

@section('title')
Catalog | APARTEMENT SKYLANE ADMIN
@endsection

@section('content')
<h3>Catalog</h3>
<button type="button" class="btn btn-tambah">
  <a href="/catalog/tambah">Tambah Data</a>
</button>
<table class="table-data">
  <thead>
    <tr>
        <th scope="col" style="width: 20%">Photo</th>
        <th>Catalog</th>
        <th scope="col" style="width: 15%">Price</th>
        <th scope="col" style="width: 30%">Description</th>
        <th scope="col" style="width: 20%">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($catalog as $catalog)
    <tr>
      <td><img src="{{ asset('img_catalog/' . $catalog->gambar)  }}" alt="" width="300px"></td>
      <td>{{ $catalog->nama }}</td>
      <td>Rp. {{ number_format($catalog->harga) }}</td>
      <td>{{ $catalog->deskripsi }}</td>
      <td>
        <a class='btn-edit' href="/catalog/edit/{{ $catalog->id_catalog }}">Edit</a>
        <a class='btn-delete' href="/catalog/hapus/{{ $catalog->id_catalog }}">Hapus</a>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="5" align="center">Tidak ada data</td>
    </tr>
    @endforelse
  </tbody>
</table>
@endsection