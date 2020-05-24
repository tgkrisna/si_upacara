<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\M_Kategori;
use App\M_Post;
use App\M_Tag;
use App\M_Status;
use App\M_Det_Post;

class Kategori extends Controller
{
    // public function side_kategori()
    // {
    // 	$kategori = Kategori::all();
    // 	view()->share('kategori',$kategori);
    // }

    public function detil_kategori($id_kategori)
    {
    	$kategori = M_Post::where('tb_post.id_kategori',$id_kategori)->where('tb_post.id_tag',NULL)
    	->leftJoin('tb_kategori','tb_post.id_kategori', '=', 'tb_kategori.id_kategori')
    	->select('tb_post.id_post','tb_kategori.nama_kategori', 'tb_post.nama_post', 'tb_post.deskripsi', 'tb_kategori.id_kategori')->paginate(10);
    	// dd($kategori);
    	// return response()->json(['data'=>$kategori]);
    	return view('admin/kategori/kategori_detil', ['kategori' => $kategori]);
    }
    public function tambah_kategori()
    {
        return view('admin/kategori/tambah_kategori');
    }
    public function input_kategori(Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => 'required|unique:tb_kategori',
            'deskripsi' => 'required|unique:tb_kategori',
        ]);
        $data = new M_Kategori();
        $data->nama_kategori = $request->nama_kategori;
        $data->deskripsi = $request->deskripsi;
        $data->save();
        return redirect('admin');
    }
    public function kategoriku()
    {
        $kategori = M_Kategori::paginate(10);
        return view('admin/kategori/detil_kategoriku', ['kategori' => $kategori]);
    }
    public function edit_kategoriku($id_kategori)
    {
        $kategori = M_Kategori::find($id_kategori);
        return view ('admin/kategori/form_u_kategoriku',['kategori' => $kategori]);
    }
    public function update_kategoriku($id_kategori, Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => 'required|unique:tb_kategori',
            'deskripsi' => 'required|unique:tb_kategori',
        ]);
        $data = M_Kategori::find($id_kategori);
        $data->nama_kategori = $request->nama_kategori;
        $data->deskripsi = $request->deskripsi;
        $data->save();
        return redirect('kategori/detil_kategoriku');
    }
    public function delete_kategoriku($id_kategori)
    {
        $kategori = M_Kategori::find($id_kategori);
        $kategori->delete();
        return redirect('kategori/detil_kategoriku');
    }
    public function tambah_post_kategori()
    {
        return view('admin/kategori/tambah_post_kategori');
    }
    public function input_post_kategori(Request $request)
    {
        $this->validate($request, [
            'nama_post' => 'required|unique:tb_post',
            'deskripsi' => 'required|unique:tb_post',
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = new M_Post();
        $youtube = $request->video;
        $file = $request->file('gambar');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'gambarku';
        $file->move($tujuan_upload,$nama_file);
        $new_key = preg_replace("#.*youtube\.com/watch\?v=#", "", $youtube);
        
        $data->id_kategori = $request->id_kategori;
        $data->nama_post = $request->nama_post;
        $data->deskripsi = $request->deskripsi;
        $data->video = $new_key;
        $data->gambar = $nama_file;
        $data->save();
        $id_kategoriku = $request->id_kategori;
        return redirect('/category/'.$id_kategoriku);
    }
    public function edit_post_k($id_post)
    {
        $kategori = M_Post::where('tb_post.id_post',$id_post)->first();
        return view('admin/kategori/edit_post_k',['kategori'=>$kategori]);
    }

    public function update_post_k($id_post, Request $request)
    {
        $this->validate($request, [
            'nama_post' => 'required',
            'deskripsi' => 'required',
        ]);
        $data = M_Post::where('tb_post.id_post',$id_post)->first();
        $data->nama_post = $request->nama_post;
        $data->deskripsi = $request->deskripsi;
        if ($request->has('video')) {
            $youtube = $request->video;
            $new_key = preg_replace("#.*youtube\.com/watch\?v=#", "", $youtube);
            $data->video = $new_key;
        }
        else{
            $youtube = $request->old_video;
            $new_key = preg_replace("#.*youtube\.com/watch\?v=#", "", $youtube);
            $data->video = $new_key;
        }
        if ($request->hasFile('gambar')) {
            $file_path = public_path().'/gambarku/'.$data['gambar'];
            if (File::exists($file_path)) {
                File::delete($file_path);
            }
            $file = $request->file('gambar');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = public_path('/gambarku');
            $file->move($tujuan_upload,$nama_file);
            $data->gambar = $nama_file;
        }
        $data->save();
        $id_kategoriku = $data->id_kategori;
        return redirect('/category/'.$id_kategoriku);
    }
    public function delete_post_k($id_post)
    {
        $kategori = M_Post::find($id_post);
        $kategori->delete();
        return redirect()->back();
    }
    public function cari_post_k(Request $request)
    {
        $cari = $request->cari;
        $id_kategori = $request->id_kategori;
        $pencarian = M_Post::where('tb_post.nama_post','LIKE',"%".$cari."%")->where('tb_post.id_kategori',$id_kategori)->paginate();
        return view('admin/kategori/kategori_detil',['kategori'=>$pencarian]);
    }
    public function detil_post_k($id_post)
    {
        $kategori_post = M_Post::where('tb_post.id_post',$id_post)->first();
        $data = M_Status::all();
        $drop_d=[];
        $new_det=[];
        foreach ($data as $kategori) {
            $id_status = $kategori->id_status;
            $nama_status = $kategori->nama_status;
            $det_pos = M_Status::where('tb_detil_post.id_post',$id_post)
            ->where('tb_detil_post.id_status',$id_status)
            ->leftJoin('tb_detil_post','tb_status.id_status','=','tb_detil_post.id_status')
            ->leftJoin('tb_post','tb_detil_post.id_parent_post','=','tb_post.id_post')
            ->select('tb_status.id_status', 'tb_status.nama_status', 'tb_post.nama_post', 'tb_post.gambar','tb_detil_post.id_post', 'tb_detil_post.id_parent_post')
            ->get();
            foreach ($det_pos as $dp) {
                $new_det[]=(object) array(
                    'id_status' => $dp->id_status,
                    'nama_status' => $dp->nama_status,
                    'nama_post' => $dp->nama_post,
                    'gambar' => $dp->gambar,
                    'id_post' => $dp->id_post,
                    'id_parent_post' => $dp->id_parent_post,
                );
            }
            $drop_d[]=(object) array(
                'id_status' => $id_status,
                'nama_status' => $nama_status,
                'det_pos' => $new_det,
            );
        }
        return view('admin/kategori/detil_post_kategori',compact('kategori_post','drop_d'));
    }
}
