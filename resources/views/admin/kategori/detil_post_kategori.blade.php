@extends('admin/layouts.app',['data' => $data])

@section('konten')

<link rel="stylesheet" href="{{asset('/assets/select2/select2.min.css')}}">
<style>
	.prosesi-title {
		white-space: nowrap;
        overflow: hidden;
        display: block;
        text-overflow: ellipsis;
	}
</style>
<div class="modal fade" id="detail-modal" tabindex="-1" role="dialog">
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
			<form class="form" action="/kategori/input_list_prosesiku/" method="POST">
				{{ csrf_field() }}
				<input type="hidden" name="type">
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label">
							<span class="add-item-label"></span>
						</label>
						<select name="id_parent_post" style="width:100%;" class="list-prosesi" class="form-control" required></select>
					</div>
					<div class="form-group category-form">
						<label class="control-label">Kategori Prosesi</label>
						<select name="id_status" class="form-control">
							<option value="1">Awal</option>
							<option value="2">Puncak</option>
							<option value="3">Akhir</option>
						</select>
					</div>
				</div>
				<input type="text" name="id_post" value="{{$kategori_post->id_post}}"/>
				<input type="text" name="id_tag" value="3"/>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>

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
			<form class="form" action="/kategori/input_list_kategoriku/" method="POST">
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
	@if (Session::has('after_save_pros'))
	<div class="row">
		<div class="col-lg-12">
			<div class="alert alert-{{ Session::get('after_save_pros.alert') }} alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>{{ Session::get('after_save_pros.title') }}</strong> {{ Session::get('after_save_pros.text-1') }}, {{ Session::get('after_save_pros.text-2') }}
			</div>
		</div>
	</div>
	@endif
	<div class="clearfix" style="margin-bottom: 16px">
		<h3 style="margin: 0" class="pull-left">
			Prosesi Upacara
		</h3>
		<a href="#" data-toggle="modal" data-target="#detail-modal" id="prosesi-button" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus">Tambah Prosesi</i></a>
	</div>
	<!-- Pake If count data post prosesi ketika 0/NULL -->

	<!-- Mulai Foreach untuk accordion sesuai dengan tb_status -->
<div class="panel-group" id="accordion">
	@foreach($drop_d as $drop)
	<div class="panel panel-primary">
		<div class="panel-heading" role="tab" id="headingOne">
            <a style="text-decoration: none; color: #ffffff;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                {{$drop->nama_status}}
            </a>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        	<div class="panel-body">
        		<div class="row">
        			<!-- Memulai foreach untuk data post prosesi -->
					<!-- Pakai if untuk melakukan foreach dengan status awal -->
					@if (!empty($drop->det_pos))
						@foreach ($drop->det_pos as $item)
							@if ($drop->id_status == $item->id_status)
        			<div class="col-lg-2">
                        <div class="panel panel-default" style="border: 1px solid #efeef4; margin-bottom: 1em">
                            <img src="/gambarku/{{$item->gambar}}" width="100%" />
                            <div class="panel-body">
                                <p class="prosesi-title">{{$item->nama_post}}</p>
                                {{-- {{$item->nama_status}} --}}
								{{-- {{$item->id_post}} --}}
								{{-- {{$item->id_det_post}} --}}
								<a href="/kategori/detil_post_kp/{{$item->id_parent_post}}/{{$item->id_post}}/{{$item->id_tag}}" class="btn btn-primary btn-sm">Lihat</a>
								<a href="/kategori/delete_list_prosesiku/{{$item->id_det_post}}" onclick="return confirm('Delete ?')" class="btn btn-danger btn-delete btn-sm" data-id="#">Hapus</a>
                            </div>
						</div>
					</div>
                    		@endif
						@endforeach
					@else
						{{-- tidak ada data --}}
					@endif
        		</div>
        	</div>
        </div>
	</div>
	@endforeach
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
		@foreach ($drop_t as $drops)
		<div class="col-lg-4">
			<h3>{{$drops->nama_tag}}</h3>
			@if (!empty($drops->det_tag))
			<div class="row" style="margin-bottom: 16px">
				@foreach ($drops->det_tag as $item)
					@if ($drops->id_tag == $item->id_tag)
						<div class="col-lg-4" style="margin-top: 16px">
							<div class="card" style="background-image: url(/gambarku/{{$item->gambar}})">
								<div class="card-body">
									{{$item->nama_post}}
									{{-- {{$item->id_post}}
									{{$item->id_parent_post}} --}}
								</div>
								<!-- Pakai if untuk deleteable -->
								<a data-id="#" href="/kategori/delete_list_kategoriku/{{$item->id_det_post}}" onclick="return confirm('Delete ?')" class="btn btn-delete btn-sm btn-danger btn-card">Hapus</a>
								<!-- Pakai endif deleteable -->
							</div>
						</div>
					@endif	
				@endforeach
					<!-- endforeach untuk nama tag tari -->
				<div class="col-lg-4" style="margin-top: 16px">
					<a class="card tag-button" href="#" data-toggle="modal" data-target="#tag-modal" data-tag="{{ $drops->id_tag }}"><i class="fa fa-plus fa-4x"></i></a>
				</div>
			</div>
			@else
			<div class="row" style="margin-bottom: 16px">
				<div class="col-lg-4" style="margin-top: 16px">
					<a class="card tag-button" href="#" data-toggle="modal" data-target="#tag-modal" data-tag="{{ $drops->id_tag }}"><i class="fa fa-plus fa-4x"></i></a>
				</div>
			</div>
			@endif
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
			url: "/kategori/list_tag",
			type: "get",
			dataType: "json",
			data: {
				id_kategori:id_kategori,
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
</script>
<script>
	$('.list-prosesi').select2();
	let id_kategoriku = {!! json_encode($kategori_post->id_kategori) !!};
	let id_post1 = {!! json_encode($kategori_post->id_post) !!};
	$('#prosesi-button').click(function(){
		let prosesi = $(this).data('prosesi');
		$.ajax({
			url: "/kategori/list_prosesi",
			type: "get",
			dataType: "json",
			data: {
				id_kategoriku:id_kategoriku,
				id_post1:id_post1
			} ,
			success: function (data) {
				console.log(data)
				let html = '<option value="">Pilih Prosesi</option>'
				for(var i=0;i < data.length; i++){
					html+='<option value="'+data[i].id_post+'">'+data[i].nama_post+'</option>';				
				}
				$('.list-prosesi').html(html);
				$('.id-tag-prosesi').val(tag);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			}
		});
	});
</script>
@endsection