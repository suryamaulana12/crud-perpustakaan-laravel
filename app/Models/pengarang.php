<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengarang extends Model
{
    protected $table = "pengarang";
    protected $primaryKey = "id";
    protected $filllable = [
        'id', 'nama', 'jenis_kelamin', 'alamat', 'karya_id'
    ];
    protected $guarded = [];

    public function karya_pengarang(){
        return $this->hasMany(karya_pengarang::class);
    }
}
