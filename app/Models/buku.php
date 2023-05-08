<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class buku extends Model
{
        protected $table = "buku";
        protected $primaryKey = "id";
        protected $fillLable = [
            'id','judul','pengarang','penerbit','tahun_terbit','gambar','created_at','updated_at'];
        protected $guarded = [];

       public function genre(){
        return $this->belongsTo(genre::class);
    }
}
