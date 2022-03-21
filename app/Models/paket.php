<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paket extends Model
{   
    protected $table = 'paket';
    use HasFactory;

    protected $fillable = [
        'id_outlet',
        'jenis',
        'nama_paket',
        'harga'
    ];

    protected $hidden = [];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'id_outlet','id');
    }
}