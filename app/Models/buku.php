<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class buku extends Model
{
        protected $table = "buku";
        protected $primaryKey = "id";
        protected $fillLable = [
            'id','judul','pengarang','penerbit','genre','tahun_terbit','gambar','created_at','updated_at'];
        protected $guarded = [];
}
