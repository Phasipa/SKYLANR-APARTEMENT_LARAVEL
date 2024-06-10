<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;
    protected $table = 'catalog';
    protected $primaryKey = 'id_catalog';
    public $incrementing = true;
    protected $fillable = ['nama', 'harga', 'deskripsi','gambar'];
    public $timestamps = false;

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'category_id', 'id_categories');
    }

}

