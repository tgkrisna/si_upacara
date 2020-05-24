@extends('admin/layouts.app',['data' => $data])

@section('konten')
<div class="row">
    <div class="col-lg-12">
        @foreach($tag as $t)
        @if ($loop->first)
    	<h1 class="page-header">
            {{$t->nama_tag}}
        </h1>
        @endif
        @endforeach
	</div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel pane-default">
            <div class="panel-heading">
                
                <div class="row">
                    <div class="col-md-2">
                        @foreach($tag as $t)
                        @if ($loop->first)
                        <a href="/tag/tambah_post_tag/{{$t->id_tag}}">
                        @endif
                        @endforeach
                            <i class="btn btn-warning btn-block">
                            <i class="fa fa-plus" style="margin-right:8px"></i>Tambah
                        </a></i>
                    </div>
                    <div class="col-md-4 col-md-offset-6">
                        <form class="form" action="/tag/cari_post_t" method="GET">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-8" style="padding-right: 0px">
                                    <input type="text" class="form-control" style="height: inherit" placeholder="Cari..." name="cari" value="{{ old('cari') }}">
                                </div>
                                <div class="col-lg-4">
                                    @foreach($tag as $t)
                                    @if ($loop->first)
                                    <input type="hidden" name="id_tag" value="{{$t->id_tag}}">
                                    @endif
                                    @endforeach
                                    <button type="submit" class="btn btn-success btn-block"><i class="fa fa-search" style="margin-right: 8px"></i>Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-10 text-right"></div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Post</th>
                        <th>Deskripsi</th>
                        <th>Kategori</th>
                        <th width="250">Operasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tag as $t)
                    <tr>
                        <td>
                            {{$t->nama_post}}
                        </td>
                        <td>
                            {!! substr($t['deskripsi'],0,10) !!}...
                        </td>
                        <td>
                            @if($t->nama_kategori =='')
                            Umum
                            @else
                            {{$t->nama_kategori}}
                            @endif
                        </td>
                        <td>
                            <input type="hidden" value="{{$t->id_tag}}">
                            <a href="/tag/edit_post_t/{{$t->id_post}}" class="btn btn-primary btn-xs"><i class="fa fa-edit" style="margin-right: 4px"></i>Edit</a>
                            <a href="/tag/detil_post_t/{{$t->id_post}}" class="btn btn-info btn-xs"><i class="fa fa-eye" style="margin-right: 4px"></i>Tag</a>
                            <a href="/tag/delete_post_t/{{$t->id_post}}" onclick="return confirm('Delete ?')" class="btn btn-danger btn-xs"><i class="fa fa-remove" style="margin-right: 4px">Hapus</i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="text-center">
            {{$tag->links()}}
        </div>
    </div>
</div>
@endsection