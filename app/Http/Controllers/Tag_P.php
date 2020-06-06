<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\M_Tag;
use App\M_Post;
use App\M_Det_Post;
use App\M_Kategori;
use App\M_Tingkatan;

class Tag_P extends Controller
{
    public function index_p(){
        $id_tag = "1";
        $tag = M_Post::where('tb_post.id_tag',$id_tag)
        ->leftJoin('tb_tag','tb_post.id_tag','=','tb_tag.id_tag')
        ->select('tb_post.id_post','tb_post.nama_post','tb_post.gambar','tb_post.deskripsi','tb_tag.nama_tag','tb_post.id_tag')
        ->paginate(5);
        return view('pengguna/tag/index_tag',compact('tag'));
    }
    public function detail_post_t($id_post,$id_tag)
    {
        $tag_post = M_Post::where('tb_post.id_post',$id_post)->first();
        $data = M_Tag::where('tb_tag.id_tag','!=',$id_tag)
        ->select('tb_tag.id_tag','tb_tag.nama_tag')
        ->get();
        $tag_all=[];
        $new_det=[];
        foreach ($data as $tag) {
            $id_tagku = $tag->id_tag;
            $nama_tag  =$tag->nama_tag;
            $det_post = M_Tag::where('tb_detil_post.id_post',$id_post)
            ->where('tb_detil_post.id_tag',$id_tagku)
            ->where('tb_detil_post.id_post',$id_post)
            ->leftJoin('tb_detil_post','tb_tag.id_tag','=','tb_detil_post.id_tag')
            ->leftJoin('tb_post','tb_detil_post.id_parent_post','=','tb_post.id_post')
            ->select('tb_tag.id_tag', 'tb_tag.nama_tag', 'tb_post.nama_post', 'tb_post.gambar','tb_detil_post.id_post', 'tb_detil_post.id_parent_post')
            ->get();
            foreach ($det_post as $dp) {
                $new_det[]=(object) array(
                    'id_tag' => $dp->id_tag,
                    'nama_tag' => $dp->nama_tag,
                    'nama_post' => $dp->nama_post,
                    'gambar' => $dp->gambar,
                    'id_post' => $dp->id_post,
                    'id_parent_post' => $dp->id_parent_post,
                );
            }
            $tag_all[]=(object) array(
                'id_tag' => $id_tagku,
                'nama_tag' => $nama_tag,
                'det_tag' => $new_det,
            );
        }
        // dd($tag_post,$tag_all);
        return view ('pengguna/tag/detail_post_tag',compact('tag_post','tag_all'));
    }
}
