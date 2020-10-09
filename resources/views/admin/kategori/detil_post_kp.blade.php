@extends('admin/layouts.app',['data' => $data])

@section('konten')

<link rel="stylesheet" href="{{asset('/assets/select2/select2.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<style>
	.prosesi-title {
		white-space: nowrap;
        overflow: hidden;
        display: block;
        text-overflow: ellipsis;
	}
</style>
<div class="modal fade" id="tag-modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
				<h4 class="modal-title">
					Tambah
					<span class="add-item-label"></span>
				</h4>
			</div>
			<form class="form" action="/kategori/input_list_kp/" method="POST">
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label">
							<span class="add-item-label"></span>
						</label>
						<select name="id_parent_post" style="width:100%;" class="list-tag" class="form-control" required></select>
					</div>
				</div>
					<input type="hidden" name="id_post" value="{{$kategori_post->id_post}}"/>
					<input type="hidden" name="id_tag" class="id-tag" value=""/>
					<input type="hidden" name="spesial" value="{{Request::segment(4)}}">
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="modal fade" id="tag-modal-gam" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
				<h4 class="modal-title">
					Tambah Gamelannn
					<span class="add-item-label"></span>
				</h4>
			</div>
			<form class="form" action="/kategori/input_list_kp_gam/" method="POST">
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label">
							<span class="add-item-label"></span>
						</label>
						<select name="id_parent_post" style="width:100%;" class="list-tag-gam" class="form-control" required></select>
					</div>
				</div>
					<input type="text" name="id_post" value="{{$kategori_post->id_post}}"/>
					<input type="text" name="id_tag" class="id-tag-gam" value=""/>
					<input type="text" name="spesial" value="{{Request::segment(4)}}">
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="modal fade" id="tag-modal-tab" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
				<h4 class="modal-title">
					Tambah Tabuhhhh
					<span class="add-item-label"></span>
				</h4>
			</div>
			<form class="form" action="/kategori/input_list_kp_tab/" method="POST">
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label">
							<span class="add-item-label"></span>
						</label>
						<select name="id_parent_post" style="width:100%;" id="list-tag-tab" class="list-tag-tab" class="form-control" required></select>
					</div>
				</div>
					<input type="text" name="id_post" value="{{$kategori_post->id_post}}"/>
					<input type="text" name="id_tag" class="id-tag-tab" value=""/>
					<input type="text" name="spesial" value="{{Request::segment(4)}}">
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="row">
	<div class="col-lg-3">
		<img src="/gambarku/{{$kategori_post->gambar}}" width="100%">
	</div>
	<div class="col-lg-9">
		<h1 class="page-header" style="margin: 0">
			{{$kategori_post->nama_post}}
		</h1>
		<h4 style="margin: 0">
			{{$kategori_post->nama_kategori}}
		</h4>
		<br>
		<div>{!!$kategori_post->deskripsi!!}</div>
		<div class="container_youtube">
			<iframe width="640" height="360" src="https://www.youtube.com/embed/{{ $kategori_post->video }}" class="video" allowfullscreen></iframe>
		</div>
	</div>
</div>
{{-- <div class="clearfix" style="margin-bottom: 16px">
	<h3 style="margin: 0" class="pull-left">
		Tingkatan Prosesi Upacara
	</h3>
	<a href="#" data-toggle="modal" data-target="#detail-modal" class="btn btn-sm btn-primary pull-right" data-type="post_prosesi"><i class="fa fa-plus">Tambah Prosesi</i></a>
</div> --}}
	<!-- Pake If count data post prosesi ketika 0/NULL -->

	<!-- Mulai Foreach untuk accordion sesuai dengan tb_status -->
<div class="panel-group" id="accordion">
	{{-- @foreach($drop_ting as $drop)
	<div class="panel panel-primary">
		<div class="panel-heading" role="tab" id="headingOne">
            <a style="text-decoration: none; color: #ffffff;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                {{$drop->nama_tingkatan}}
            </a>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        	<div class="panel-body">
        		<div class="row"> --}}
        			<!-- Memulai foreach untuk data post prosesi -->
					<!-- Pakai if untuk melakukan foreach dengan status awal -->
					{{-- @if (!empty($drop->det_pos))
						@foreach ($drop->det_pos as $item)
							@if ($drop->id_tingkatan == $item->id_tingkatan)
        			<div class="col-lg-2">
                        <div class="panel panel-default" style="border: 1px solid #efeef4; margin-bottom: 1em">
                            <img src="/gambarku/{{$item->gambar}}" width="100%" />
                            <div class="panel-body">
                                <p class="prosesi-title">{{$item->nama_post}}</p>
                                {{$item->nama_tingkatan}}
								{{$item->id_post}}
								{{$item->id_parent_post}}
							<a href="#" class="btn btn-primary btn-sm">Lihat</a>
                            	<a href="#" class="btn btn-danger btn-delete btn-sm" data-id="#">Hapus</a>
                            </div>
						</div>
					</div>
                    		@endif
						@endforeach
					@else --}}
						{{-- tidak ada data --}}
					{{-- @endif
        		</div>
        	</div>
        </div>
	</div>
	@endforeach --}}
	<hr>
	@if (Session::has('after_save'))
	<div class="row">
		<div class="col-lg-12">
			<div class="alert alert-{{ Session::get('after_save.alert') }} alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>{{ Session::get('after_save.title') }}</strong> {{ Session::get('after_save.text-1') }}, {{ Session::get('after_save.text-2') }}
			</div>
		</div>
	</div>
	@endif
	<div class="row">
		<!-- Mulai foreach untuk data tag, kecuali prosesi upacara -->
		@foreach ($drop_tag as $drops)
		<div class="col-lg-4">
			<h3>{{$drops->nama_tag}}</h3>
			@if (!empty($drops->det_tag))
			<div class="row" style="margin-bottom: 16px">
				@foreach ($drops->det_tag as $item)
					@if ($drops->id_tag == $item->id_tag)
				<div class="col-lg-4" style="margin-top: 16px">
					<div class="card" style="background-image: url('/gambarku/{{$item->gambar}}')">
						<div class="card-body">
							@if ($item->nama_post2 !='')
								{{$item->nama_post}}
								({{$item->nama_post2}})
							@else
								{{$item->nama_post}}
							@endif
							{{-- {{$item->id_post}}
							{{$item->id_parent_post}} --}}
						</div>
						<!-- Pakai if untuk deleteable -->
						<button data-id="#" class="btn btn-delete btn-sm btn-danger btn-card" data-toggle="modal" data-target="#exampleModal{{$item->id_det_post}}">Hapus</button>
						<div class="modal fade" id="exampleModal{{$item->id_det_post}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									Apakah anda yakin ingin menghapus data ini ?
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
									<a data-id="#/{{$item->id_post}}" href="/kategori/delete_list_kp/{{$item->id_det_post}}" type="button" class="btn btn-primary">Hapus</a>
								</div>
								</div>
							</div>
						</div>
						<!-- Pakai endif deleteable -->
					</div>
				</div>
					@endif	
				@endforeach
				@else
				{{-- tidak ada data --}}
				@endif
				@if ($drops->id_tag =='1')
					<div class="col-lg-4" style="margin-top: 16px">
						<a class="card tag-button-gam" id="tag-button-gam" data-toggle="modal" href="#" data-target="#tag-modal-gam" data-tag-gam="{{ $drops->id_tag }}"" data-tag-posts="{{Request::segment(4)}}"><i class="fa fa-plus fa-4x"></i></a>
					</div>
				@elseif ($drops->id_tag =='5')
					@php
					$result = [];	
					@endphp
						@foreach ($drops->det_tag as $item2)
							{{-- @if ($item2 !='') --}}
								@php
								$result[] = $item2->id_root_post;
								// $result[] = $item2->id_root_post;
								@endphp
							{{-- @endif --}}
						@endforeach
					@php
						$DAT=implode(',', array_unique($result));
					@endphp
					<div class="col-lg-4" style="margin-top: 16px">
						<a class="card tag-button-tab" id="tag-button-tab" data-toggle="modal" href="#" data-target="#tag-modal-tab" data-tag-tab="{{ $drops->id_tag }}" data-gmbl="{{$DAT}}"><i class="fa fa-plus fa-4x"></i></a>
					</div>
				@else
					<div class="col-lg-4" style="margin-top: 16px">
						<a class="card tag-button" data-toggle="modal" href="#" data-target="#tag-modal" data-tag="{{ $drops->id_tag }}"><i class="fa fa-plus fa-4x"></i></a>
					</div>
				@endif
			</div>
				{{-- <div class="col-lg-4" style="margin-top: 16px">
					<a class="card tag-button" data-toggle="modal" href="#" data-target="#tag-modal" data-tag="{{ $drops->id_tag }}"><i class="fa fa-plus fa-4x"></i></a>
				</div> --}}
		</div>
		@endforeach
		<!-- endforeach data tag -->
	</div>	
</div>
<script src="{{asset('/assets/select2/select2.min.js')}}"></script>
<script>
$('.list-tag').select2();
let id_kategori = {!! json_encode($kategori_post->id_kategori) !!};
let id_post = {!! json_encode($kategori_post->id_post) !!};
$('.tag-button').click(function(){
	let tag = $(this).data('tag');
	$.ajax({
		url: "/tag/dropdown",
		type: "get",
		dataType: "json",
		data: {
			id_tag:tag
		} ,
		success: function (data) {
			console.log(data)
			let html = '<option value="">Pilih Jenis</option>'
			for(var i=0;i < data.length; i++){
				html+='<option value="'+data[i].id_post+'">'+data[i].nama_post+'</option>';				
			}
			$('.list-tag').html(html);
			$('.id-tag').val(tag);
		},
		error: function(jqXHR, textStatus, errorThrown) {
			console.log(textStatus, errorThrown);
		}
	});
});
$('.list-tag-gam').select2();
let id_kategoris = {!! json_encode($kategori_post->id_kategori) !!};
// let id_posts = {!! json_encode($kategori_post->id_post) !!};
$('#tag-button-gam').click(function(){
	let id_posts = $(this).data('tag-posts')
	let tags = $(this).data('tag-gam');
	$.ajax({
		url: "/tag/dropdown_gam",
		type: "get",
		dataType: "json",
		data: {
			id_tags:tags,
			id_posts:id_posts
		} ,
		success: function (data) {
			console.log(data)
			let html = '<option value="">Pilih Jenis</option>'
			for(var i=0;i < data.length; i++){
				html+='<option value="'+data[i].id_parent_post+'">'+data[i].nama_post+'</option>';				
			}
			$('.list-tag-gam').html(html);
			$('.id-tag-gam').val(tags);
		},
		error: function(jqXHR, textStatus, errorThrown) {
			console.log(textStatus, errorThrown);
		}
	});
});
$('.list-tag-tab').select2();
	let id_tags = {!! json_encode($kategori_post->id_kategori) !!};
	let id_posts = {!! json_encode($kategori_post->id_post) !!};
$('#tag-button-tab').click(function(){
	let gmbl = $(this).data('gmbl');
	let tagk = $(this).data('tag-tab');
	$.ajax({
		url: "/tag/dropdown_tabuh",
		type: "get",
		dataType: "json",
		data: {
			id_tags:tagk,
			id_gambelan:gmbl
		},
		success: function (data) {
			console.log(data);
			let html = '<option value="">Pilih Jenis</option>';
			for(var i=0;i < data.length; i++){
				html+='<option value="'+data[i].id_parent_post+'">'+data[i].nama_post+'</option>';
				let rot_post = data[i].id_root_post;
				$('.id-root-post').val(rot_post);				
				}
			$('#list-tag-tab').html(html);
			$('.id-tag-tab').val(tagk);	
		},
		error: function(jqXHR, textStatus, errorThrown) {
			console.log(textStatus, errorThrown);
		}
	});
});
</script>
@endsection