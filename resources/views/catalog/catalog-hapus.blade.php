@extends('layouts.app')

@section('title')
Hapus Catalog | APARTEMENT SKYLANE ADMIN
@endsection

@section('content')
<h3>Hapus Catalog</h3>
<div class="form-login">
  <h4>Ingin Menghapus Data ?</h4>
  <button type="submit" class="btn btn-simpan" name="hapus" style="width: 40%; margin: 20px auto;">
    <a href={{ url('/catalog/destroy/' . $catalog->id_catalog) }}>
      Yes
    </a>
  </button>
  <button type="submit" class="btn btn-simpan" name="tidak" style="width: 40%; margin: 20px auto;">
    <a href="/catalog">
      No
    </a>
  </button>
</div>
@endsection
