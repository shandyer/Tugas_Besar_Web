<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;

    protected $label = "jurnal";
    protected $fillable = ['id', 'judul', 'penulis', 'issn', 'volume', 'penerbit', 'halaman', 'url', 'bahasa'];
}
