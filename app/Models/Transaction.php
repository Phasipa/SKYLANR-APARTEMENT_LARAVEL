<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = ['nama', 'nomorhp', 'alamat', 'catalog_id', 'harga', 'status'];
   
    public function catalog()
    {
        return $this->belongsTo(Catalog::class, 'catalog_id', 'id_catalog');
    }

}
