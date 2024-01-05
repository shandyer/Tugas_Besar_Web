<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    use HasFactory;

    protected $label = "artikel";
    protected $fillable = ['id', 'judul', 'penulis', 'nama_seminar', 'penyelenggara', 'halaman', 'isbn', 'waktu_pelaksanaan','url'];
}
