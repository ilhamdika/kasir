<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_menu',
        'harga',
        'foto',
        'stok',
        'keterangan',
        'kategori'
    ];

    public function scopeFilter(Builder $query, $request)
    {
        $query->when($request['kategori'] ?? false, function ($query, $kategori) {
            return $query->where('kategori', $kategori);
        });
    }
}
