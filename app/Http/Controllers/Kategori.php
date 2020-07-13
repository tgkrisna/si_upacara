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
use App\M_Tingkatan;
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
        $namas = M_Kategori::where('tb_kategori.id_kategori',$id_kategori)->first();
    	$kategori = M_Post::where('tb_post.id_kategori',$id_kategori)->where('tb_post.id_tag',NULL)
    	->leftJoin('tb_kategori','tb_post.id_kategori', '=', 'tb_kategori.id_kategori')
    	->select('tb_post.id_post','tb_kategori.nama_kategori', 'tb_post.nama_post', 'tb_post.deskripsi', 'tb_kategori.id_kategori')->paginate(10);
    	return view('admin/kategori/kategori_detil', compact('namas','kategori'));
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
        $namas = M_Kategori::where('tb_kategori.id_kategori',$id_kategori)->first();
        $kategori = M_Post::where('tb_post.nama_post','LIKE',"%".$cari."%")->where('tb_post.id_kategori',$id_kategori)->paginate();
        return view('admin/kategori/kategori_detil',compact('namas','kategori'));
        //Error logic menggunakan 1 view, apakah harus 2 view?
    }
    public function detil_post_k($id_post)
    {
        $id_tag=3;
        $id_tag2=5;
        $kategori_post = M_Post::where('tb_post.id_post',$id_post)->first();
        

        $data = M_Status::all();
        $data_tag = M_Tag::where('tb_tag.id_tag','!=',$id_tag)
        ->where('tb_tag.id_tag','!=',$id_tag2)
        ->select('id_tag','nama_tag')
        ->get();
        $drop_d=[];
        $new_det=[];
        $drop_t=[];
        $new_tag=[];
        foreach ($data as $kategori) {
            $id_status = $kategori->id_status;
            $nama_status = $kategori->nama_status;
            $det_pos = M_Status::where('tb_detil_post.id_post',$id_post)
            ->where('tb_detil_post.id_status',$id_status)
            ->leftJoin('tb_detil_post','tb_status.id_status','=','tb_detil_post.id_status')
            ->leftJoin('tb_post','tb_detil_post.id_parent_post','=','tb_post.id_post')
            ->select('tb_status.id_status', 'tb_status.nama_status', 'tb_post.nama_post', 'tb_post.gambar','tb_detil_post.id_post', 'tb_detil_post.id_parent_post', 'tb_detil_post.id_tag')
            ->get();
            foreach ($det_pos as $dp) {
                $new_det[]=(object) array(
                    'id_status' => $dp->id_status,
                    'nama_status' => $dp->nama_status,
                    'nama_post' => $dp->nama_post,
                    'gambar' => $dp->gambar,
                    'id_post' => $dp->id_post,
                    'id_parent_post' => $dp->id_parent_post,
                    'id_tag' => $dp->id_tag,
                );
            }
            $drop_d[]=(object) array(
                'id_status' => $id_status,
                'nama_status' => $nama_status,
                'det_pos' => $new_det,
            );
        }
        foreach ($data_tag as $tag) {
            $id_tagku = $tag->id_tag;
            $nama_tag = $tag->nama_tag;
            $det_tag = M_Det_Post::where('tb_detil_post.id_post',$id_post)
            ->where('tb_detil_post.spesial',$id_post)
            ->leftJoin('tb_post','tb_detil_post.id_parent_post','=','tb_post.id_post')
            ->leftJoin('tb_tag','tb_detil_post.id_tag','=','tb_tag.id_tag')
            ->select('tb_detil_post.id_post', 'tb_detil_post.id_parent_post', 'tb_detil_post.id_tag', 
                    'tb_post.nama_post', 'tb_post.gambar' ,'tb_tag.nama_tag', 'tb_detil_post.id_det_post')
            ->get();
            foreach ($det_tag as $dt) {
                $new_tag[]=(object) array(
                    'id_post' => $dt->id_post,
                    'id_parent_post' => $dt->id_parent_post,
                    'id_tag' => $dt->id_tag,
                    'nama_post' => $dt->nama_post,
                    'gambar' => $dt->gambar,
                    'nama_tag' => $dt->nama_tag,
                    'id_det_post' => $dt->id_det_post,
                );
            }
            $drop_t[]=(object) array(
                'id_tag' => $id_tagku,
                'nama_tag' => $nama_tag,
                'det_tag' => $new_tag,
            );
        }
        return view('admin/kategori/detil_post_kategori',compact('kategori_post','drop_d','drop_t'));
    }
    public function detil_post_kp($id_parent_post,$id_post,$id_tag)
    {
        $kategori_post = M_Post::where('tb_post.id_post',$id_parent_post)->first();
        // $data_tingkatanku = M_Post::where('tb_post.id_post',$id_parent_post)
        // ->where('tb_detil_post.spesial',$id_post)
        // ->leftJoin('tb_detil_post','tb_post.id_post','=','tb_detil_post.id_post')
        // ->leftJoin('tb_tingkatan','tb_detil_post.id_tingkatan','=','tb_tingkatan.id_tingkatan')
        // ->select()
        $data_tingkatan = M_Tingkatan::all();
        $data_tag = M_Tag::where('tb_tag.id_tag','!=',$id_tag)
        ->select('id_tag','nama_tag')
        ->get();
        $drop_ting = [];
        $new_ting = [];
        $drop_tag = [];
        $new_tag = [];

        foreach ($data_tingkatan as $d_ting) {
            $id_tingkatan = $d_ting->id_tingkatan;
            $nama_tingkatan = $d_ting->nama_tingkatan;
            $det_post = M_Post::where('tb_post.id_post',$id_parent_post)
            ->where('tb_detil_post.spesial',$id_post)
            ->leftJoin('tb_detil_post','tb_post.id_post','=','tb_detil_post.id_post')
            ->leftJoin('tb_tingkatan','tb_detil_post.id_tingkatan','=','tb_tingkatan.id_tingkatan')
            ->select('tb_post.nama_post','tb_post.gambar'
                    ,'tb_detil_post.id_tingkatan','tb_detil_post.id_post','tb_detil_post.id_parent_post')
            ->get();
            foreach ($det_post as $dt) {
                $new_ting[]=(object)array(
                    'id_post' => $dt->id_post,
                    'nama_post' => $dt->nama_post,
                    'gambar' => $dt->gambar,
                    'id_tingkatan' => $dt->id_tingkatan,
                    'id_parent_post' => $dt->id_parent_post,
                ); 
            }
            $drop_ting[]=(object)array(
                'id_tingkatan' => $id_tingkatan,
                'nama_tingkatan' => $nama_tingkatan,
                'det_post' => $new_ting,
            );
        }
        foreach ($data_tag as $tag) {
            $id_tagku = $tag->id_tag;
            $nama_tag = $tag->nama_tag;
            $det_tag = M_Det_Post::where('tb_detil_post.id_post',$id_parent_post)
            ->where('tb_detil_post.spesial',$id_post)
            ->leftJoin('tb_post','tb_detil_post.id_parent_post','=','tb_post.id_post')
            ->leftJoin('tb_tag','tb_detil_post.id_tag','=','tb_tag.id_tag')
            ->select('tb_detil_post.id_post', 'tb_detil_post.id_parent_post', 
            'tb_detil_post.id_tag', 'tb_post.nama_post', 'tb_post.gambar', 'tb_detil_post.id_det_post')
            ->get();
            foreach ($det_tag as $dt) {
                $new_tag[]=(object) array(
                    'id_post' => $dt->id_post,
                    'id_parent_post' => $dt->id_parent_post,
                    'id_tag' => $dt->id_tag,
                    'nama_post' => $dt->nama_post,
                    'gambar' => $dt->gambar,
                    'id_det_post' => $dt->id_det_post,
                );
            }
            $drop_tag[]=(object) array(
                'id_tag' => $id_tagku,
                'nama_tag' => $nama_tag,
                'det_tag' => $new_tag,
            );
        }
        return view('admin/kategori/detil_post_kp',compact('kategori_post','drop_ting','drop_tag'));
    }
    public function list_tag(Request $request)
    {
        $data_tag = M_Post::where('tb_post.id_tag','=',$request->id_tag)
        // ->where('tb_post.id_kategori','=',$request->id_kategori)
        ->get();
        return $data_tag;
    }
    public function list_prosesi(Request $request)
    {
        $data_tag = M_Post::where('tb_post.id_tag','=',$request->id_tag)
        ->get();
        return $data_prosesi;
    }
    public function input_list_kategoriku(Request $request)
    {
        $cek = M_Det_Post::where('id_parent_post', $request->id_parent_post)->where('id_post', $request->id_post)
        ->where('spesial', $request->id_post)->count();
            if($cek < 1){
                $data = new M_Det_Post();
                $data->id_tag = $request->id_tag;
                $data->id_post = $request->id_post;
                $data->id_parent_post = $request->id_parent_post;
                $data->spesial = $request->id_post;
                $data->save();

                $after_save = [
                    'alert' => 'success',
                    'title' => 'Berhasil!',
                    'text-1' => 'Selamat',
                    'text-2' => 'Data berhasil ditambah.'
                ];

                return redirect()->back()->with(compact('after_save'));
            }else{
                $after_save = [
                    'alert' => 'danger',
                    'title' => 'Peringatan!',
                    'text-1' => 'Ada kesalahan',
                    'text-2' => 'Data sudah ada.'
                ];
                return redirect()->back()->with(compact('after_save'));
            }
    }
    public function delete_list_kategoriku($id_det_post)
    {
        try {
            $kategori = M_Det_Post::find($id_det_post);
            $kategori->delete();
    
            $after_save = [
                'alert' => 'success',
                'title' => 'Berhasil!',
                'text-1' => 'Selamat',
                'text-2' => 'Data berhasil dihapus.'
            ];
            return redirect()->back()->with(compact('after_save'));
        } catch (\exception $e) {
            $after_save = [
                'alert' => 'danger',
                'title' => 'Peringatan!',
                'text-1' => 'Ada kesalahan',
                'text-2' => 'Silahkan periksa kembali.'
            ];
            return redirect()->back()->with(compact('after_save'));
        }
    }
    public function input_list_kp(Request $request)
    {
        $cek = M_Det_Post::where('id_parent_post', $request->id_parent_post)->where('id_post', $request->id_post)
        ->where('spesial', $request->spesial)->count();
        if ($cek < 1) {
            $data = new M_Det_Post();
            $data->id_tag = $request->id_tag;
            $data->id_post = $request->id_post;
            $data->id_parent_post = $request->id_parent_post;
            $data->spesial = $request->spesial;
            $data->save();

            $after_save = [
                'alert' => 'success',
                'title' => 'Berhasil!',
                'text-1' => 'Selamat',
                'text-2' => 'Data berhasil ditambah.'
            ];

            return redirect()->back()->with(compact('after_save'));
        } else {
            $after_save = [
                'alert' => 'danger',
                'title' => 'Peringatan!',
                'text-1' => 'Ada kesalahan',
                'text-2' => 'Data sudah ada.'
            ];
            return redirect()->back()->with(compact('after_save'));
        }
    }
    public function delete_list_kp($id_det_post)
    {
        try {
            $kategori = M_Det_Post::find($id_det_post);
            $kategori->delete();
    
            $after_save = [
                'alert' => 'success',
                'title' => 'Berhasil!',
                'text-1' => 'Selamat',
                'text-2' => 'Data berhasil dihapus.'
            ];
            return redirect()->back()->with(compact('after_save'));
        } catch (\exception $e) {
            $after_save = [
                'alert' => 'danger',
                'title' => 'Peringatan!',
                'text-1' => 'Ada kesalahan',
                'text-2' => 'Silahkan periksa kembali.'
            ];
            return redirect()->back()->with(compact('after_save'));
        }
    }
}
