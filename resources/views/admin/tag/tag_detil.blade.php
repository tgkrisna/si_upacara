@extends('admin/layouts.app',['data' => $data])

@section('konten')
{{-- <div class="row">
    <div class="col-lg-12">   --}}
        @php 
        $seg = Request::segment(2);
        @endphp
{{--
        @if ($seg == 5)
           @foreach ($tingkatan as $ting)
                @if ($loop->first)
           <h1 class="page-header">
            {{$ting->nama_tag}}
        </h1>
                @endif
           @endforeach 
        @else
            @foreach($tag as $t)
                @if ($loop->first)
           <h1 class="page-header">
               {{$t->nama_tag}}
           </h1>
                @endif
           @endforeach 
        @endif
	</div>
</div> --}}
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            {{$namas->nama_tag}}
        </h1>
	</div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-2">
                        @if ($seg == 5)
                            @foreach($tingkatan as $ting)
                                @if ($loop->first)
                                <a href="/tag/tambah_post_tag/{{$ting->id_tag}}" class="btn btn-warning btn-block">
                                    <i class="fa fa-plus" style="margin-right:8px"></i>Tambah
                                </a>
                                @endif
                            @endforeach
                        @else
                            <a href="/tag/tambah_post_tag/{{$namas->id_tag}}" class="btn btn-warning btn-block">
                                <i class="fa fa-plus" style="margin-right:8px"></i>Tambah
                            </a>
                        @endif
                    </div>
                    <div class="col-md-4 col-md-offset-6">
                        <form class="form" action="/tag/cari_post_t" method="GET">
                            <div class="row">
                                <div class="col-lg-8" style="padding-right: 0px">
                                    <input type="text" class="form-control" style="height: inherit" placeholder="Cari..." name="cari">
                                </div>
                                <div class="col-lg-4">
                                    @if ($seg == 5)
                                        @foreach($tingkatan as $ting)
                                            @if ($loop->first)
                                            <input type="hidden" name="id_tag" value="{{$ting->id_tag}}">
                                            @endif
                                        @endforeach
                                    @else
                                        <input type="hidden" name="id_tag" value="{{$namas->id_tag}}">
                                    @endif
                                    <button type="submit" class="btn btn-success btn-block"><i class="fa fa-search" style="margin-right: 8px"></i>Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-10 text-right"></div>
                </div>
            </div>
            <table class="table">
                @if ($seg == 5)
                <thead>
                    <tr>
                        <th>Nama Post</th>
                        <th>Deskripsi</th>
                        {{-- <th>Kategori</th> --}}
                        {{-- <th width="250">Operasi</th> --}}
                    </tr>
                </thead> 
                @else
                <thead>
                    <tr>
                        <th>Nama Post</th>
                        <th>Deskripsi</th>
                        {{-- <th>Kategori</th> --}}
                        <th width="250">Operasi</th>
                    </tr>
                </thead>
                @endif
                <tbody>
                    @if ($seg == 5)
                        @foreach($tingkatan as $ting)
                            <tr>
                                <td>
                                    {{$ting->nama_tingkatan}}
                                </td>
                                <td>
                                    {!! substr($ting['deskripsi'],0,10) !!}...
                                </td>
                                {{-- <td>
                                    @if($t->nama_kategori =='')
                                    Umum
                                    @else
                                    {{$t->nama_kategori}}
                                    @endif
                                </td> --}}
                            </tr>
                        @endforeach
                    @else
                        @foreach($tag as $t)
                            <tr>
                                <td>
                                    {{$t->nama_post}}
                                </td>
                                <td>
                                    {!! substr($t['deskripsi'],0,10) !!}...
                                </td>
                                {{-- <td>
                                    @if($t->nama_kategori =='')
                                    Umum
                                    @else
                                    {{$t->nama_kategori}}
                                    @endif
                                </td> --}}
                                <td>
                                    <a href="/tag/edit_post_t/{{$t->id_post}}" class="btn btn-primary btn-xs"><i class="fa fa-edit" style="margin-right: 4px"></i>Edit</a>
                                    <a href="/tag/detil_post_t/{{$t->id_tag}}/{{$t->id_post}}" class="btn btn-info btn-xs"><i class="fa fa-eye" style="margin-right: 4px"></i>Tag</a>
                                    <a href="/tag/delete_post_t/{{$t->id_post}}" onclick="return confirm('Delete ?')" class="btn btn-danger btn-xs"><i class="fa fa-remove" style="margin-right: 4px">Hapus</i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="text-center">
            {{$tag->links()}}
        </div>
    </div>
</div>
@endsection