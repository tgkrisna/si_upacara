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
        $id_tag = "3";
        $tag = M_Post::where('tb_post.id_tag',$id_tag)
        ->leftJoin('tb_tag','tb_post.id_tag','=','tb_tag.id_tag')
        ->paginate(5);
        return view('pengguna/tag/index_tag',compact('tag'));
    }
}
