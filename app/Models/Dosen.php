<?php

// app/Models/Dosen.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosen';

    protected $fillable = ['nama_dosen'];

    public function matakuliah()
    {
        return $this->hasMany(Matakuliah::class);
    }
}

