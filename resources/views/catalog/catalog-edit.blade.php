@extends('layouts.app')

@section('title')
Edit Catalog | APARTEMENT SKYLANE ADMIN
@endsection

@section('content')
<h3>Edit Catalog</h3>
<div class="form-login">
  <form action="{{ url('/catalog/update/' . $catalog->id_catalog) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <label for="catalog">Catalog</label>
    <input class="input" type="text" name="nama" id="catalog" placeholder="Catalog"
    value="{{ old('nama', $catalog->nama) }}" />
    @error('nama')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="price">Price</label>
    <input class="input" type="text" name="harga" id="price" placeholder="Price"
      value="{{ old('harga', $catalog->harga) }}" />
    @error('harga')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="description">Description</label>
    <textarea class="input" name="deskripsi" id="description"
      placeholder="Description">{{ old('deskripsi', $catalog->deskripsi) }}</textarea>
    @error('deskripsi')
    <p style="font-size: 10px; color: red">{{ $message }}</p>  
    @enderror

    <label for="photo">Photo</label>
    <img src="{{ asset('img_catalog/' . $catalog->gambar) }}" alt="" width="200px">
    <input type="file" name="gambar" id="photo" />
    @error('gambar')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <button type="submit" class="btn btn-simpan" name="edit" style="margin-top: 50px">
      Edit
    </button>
  </form>
</div>
@endsection
