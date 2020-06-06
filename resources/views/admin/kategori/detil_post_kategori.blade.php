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
			<form class="form" action="#" method="POST">
				<input type="hidden" name="type">
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label">
							<span class="add-item-label"></span>
						</label>
						<select name="detail" class="form-control" required></select>
					</div>
					<div class="form-group category-form">
						<label class="control-label">Kategori Prosesi</label>
						<select name="tb_status" class="form-control" disabled>
							<option value="id_status 1">Awal</option>
							<option value="id_status 2">Puncak</option>
							<option value="id_status 3">Akhir</option>
						</select>
					</div>
				</div>
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
	<div class="clearfix" style="margin-bottom: 16px">
		<h3 style="margin: 0" class="pull-left">
			Prosesi Upacara
		</h3>
		<a href="#" data-toggle="modal" data-target="#detail-modal" class="btn btn-sm btn-primary pull-right" data-type="post_prosesi"><i class="fa fa-plus">Tambah Prosesi</i></a>
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
								{{-- {{$item->id_parent_post}} --}}
								<a href="/kategori/detil_post_kp/{{$item->id_parent_post}}/{{$item->id_post}}/{{$item->id_tag}}" class="btn btn-primary btn-sm">Lihat</a>
                            	<a href="#" class="btn btn-danger btn-delete btn-sm" data-id="#">Hapus</a>
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
							{{$item->id_post}}
							{{$item->id_parent_post}}
						</div>
						<!-- Pakai if untuk deleteable -->
						<a data-id="#" class="btn btn-delete btn-sm btn-danger btn-card">Hapus</a>
						<!-- Pakai endif deleteable -->
					</div>
				</div>
					@endif	
				@endforeach
					<!-- endforeach untuk nama tag tari -->
				<div class="col-lg-4" style="margin-top: 16px">
					<a class="card" data-toggle="modal" href="#detail-modal" data-type="tari"><i class="fa fa-plus fa-4x"></i></a>
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
	
</script>
@endsection