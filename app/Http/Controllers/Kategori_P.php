<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\M_Tag;
use App\M_Post;
use App\M_Det_Post;
use App\M_Kategori;
use App\M_Tingkatan;

class Kategori_P extends Controller
{
    public function index_k(){
        $id_kategori = "3";
        $kategori = M_Post::where('tb_post.id_kategori',$id_kategori)
        ->leftJoin('tb_kategori','tb_post.id_kategori','=','tb_kategori.id_kategori')
        ->select('tb_post.id_post','tb_post.nama_post','tb_post.gambar','tb_post.deskripsi','tb_kategori.nama_kategori','tb_post.id_kategori')
        ->paginate(5);
        return view('pengguna/kategori/index_kategori',compact('kategori'));
    }
}
