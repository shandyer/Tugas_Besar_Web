<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $label = "buku";
    protected $fillable = ['id', 'judul', 'penulis', 'isbn', 'jenis', 'penerbit', 'halaman', 'url'];
}
