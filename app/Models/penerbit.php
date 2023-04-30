<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penerbit extends Model
{
    protected $table = "penerbit";
    protected $primaryKey = "id";
    protected $filllable = [
        "id","nama","terbitan_populer","alamat"
    ];

    protected $guarded = [];
}
