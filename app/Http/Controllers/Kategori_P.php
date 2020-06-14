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
    public function index_k($id_kategori){
        $kategori = M_Post::where('tb_post.id_kategori',$id_kategori)
        ->where('tb_post.id_tag',NULL)
        ->leftJoin('tb_kategori','tb_post.id_kategori','=','tb_kategori.id_kategori')
        ->select('tb_post.id_post','tb_post.nama_post','tb_post.gambar','tb_post.deskripsi','tb_kategori.nama_kategori','tb_post.id_kategori')
        ->paginate(5);
        return view('pengguna/kategori/index_kategori',compact('kategori'));
    }

    public function homepage(){
        return view('pengguna/homepage2');
    }

    public function detail_post_k($id_post,$id_kategori)
    {
        $kategori_post = M_Post::where('tb_post.id_post',$id_post)
        ->leftJoin('tb_kategori','tb_post.id_kategori','=','tb_kategori.id_kategori')
        ->select('tb_post.id_post','tb_post.nama_post','tb_post.video','tb_post.gambar','tb_post.deskripsi','tb_kategori.nama_kategori')
        ->first();
        $data = M_Tag::select('tb_tag.id_tag','tb_tag.nama_tag')
        ->get();
        $kategori_all = [];
        $new_det = [];
        foreach ($data as $kategori) {
            $id_tag = $kategori->id_tag;
            $nama_tag = $kategori->nama_tag;
            $det_post = M_Det_Post::where('tb_detil_post.id_post',$id_post)
            ->where('tb_detil_post.spesial',$id_post)
            ->leftJoin('tb_post','tb_detil_post.id_parent_post','=','tb_post.id_post')
            ->leftJoin('tb_tag','tb_detil_post.id_tag','=','tb_tag.id_tag')
            ->select('tb_detil_post.id_post','tb_detil_post.id_parent_post','tb_detil_post.id_tag','tb_post.nama_post','tb_post.gambar')
            ->get();
            foreach ($det_post as $dp) {
                $new_det[]=(object) array(
                    'id_post' => $dp->id_post,
                    'id_parent_post' => $dp->id_parent_post,
                    'id_tag' => $dp->id_tag,
                    'nama_post' => $dp->nama_post,
                    'gambar' => $dp->gambar,
                );
            }
            $kategori_all[] = (object) array(
                'id_tag' => $id_tag,
                'nama_tag' => $nama_tag,
                'det_kategori' => $new_det, 
            );
        }
        return view('/pengguna/kategori/detail_post_kategori',compact('kategori_post','kategori_all'));
    }
}
