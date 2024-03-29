@extends('admin/layouts.app',['data' => $data])

@section('konten')
<link rel="stylesheet" href="{{asset('/assets/select2/select2.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}" />
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
			<form class="form" action="/tag/input_list_tagku/" method="POST">
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label">
							<span class="add-item-label"></span>
						</label>
						<select name="id_parent_post" style="width:100%;" class="list-tag" class="form-control" required></select>
					</div>
				</div>
					<input type="hidden" name="id_post" value="{{$tag_post->id_post}}"/>
					<input type="hidden" name="id_tag" class="id-tag" value=""/>
					<input type="hidden" name="id_tagku" value="{{$tag_post->id_tag}}">
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>
<br>
<div class="row">
	<div class="col-lg-3">
		@if($tag_post->gambar != '')
		<img src="/gambarku/{{$tag_post->gambar}}" width="100%">
		@else
		<img src="/assets/images/placeholder.png" width="100%">
		@endif
		<p class="font-italic">Sumber Gambar: {{$tag_post->sumber_gambar}}</p>
	</div>
	<div class="col-lg-9">
		<h1 class="page-header" style="margin: 0">
			{{$tag_post->nama_post}}
			<br>
		</h1>
		<div>{!! $tag_post->deskripsi !!}</div>
		<div class="mapouter">
			<div class="gmap_canvas">
				<iframe width="910" height="480" src="https://www.youtube.com/embed/{{ $tag_post->video }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<style>
					.mapouter{position:relative;text-align:center; display:block; height:95%;width:100%;}
					.gmap_canvas {overflow:hidden;background:none!important;height:95%;width:100%;}
				</style>
			</div>
		</div>
		<p class="font-italic">Sumber Video: {{$tag_post->sumber_video}}</p>
	</div>
</div>
@endsection