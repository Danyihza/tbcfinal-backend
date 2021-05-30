<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $table = 'prodi';
    protected $fillable = [
        'nama_prodi'
    ];
    protected $primaryKey = 'id_prodi';


    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'prodi', 'id_prodi');
    }
}
