@extends('admin/layouts.app',['data' => $data])

@section('konten')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			Edit {{$tag->nama_post}}
		</h1>
	</div>
<!-- 	<div class="col-lg-6"> -->
		<div class="panel panel-default">
			<form class="form" action="/tag/update_post_t/{{$tag->id_post}}" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				{{-- <input type="hidden" name="id_kategori" value="{{Request::segment(3)}}"> --}}
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label">Nama Post<span class="text-danger">*</span></label>
								<input type="text" name="nama_post" class="form-control" value="{{ $tag->nama_post }}" required>
								@if($errors->has('nama_post'))
								<div class="text-danger">
									{{$errors->first('nama_post')}}
								</div>
								@endif
							</div>
							{{-- <div class="form-group">
								<label class="control-label">Kategori Yadnya<span class="text-danger">*</span></label>
								<select type="text" name="id_kategori" class="form-control">
									@foreach($kategori as $kat)
									<option value="{{$kat->id_kategori}}">{{$kat->nama_kategori}}</option>
									@endforeach
									<option value="">Umum</option>
								</select>
							</div> --}}
							@if(strlen($tag['video']) != 0)
							<div class="form-group">
								<label class="control-label">Video Terdahulu</label>
								<div class="mapouter">
									<div class="gmap_canvas">
										<iframe width="500" height="300" src="https://www.youtube.com/embed/{{ $tag->video }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
										<style>
											.mapouter{position:relative;text-align:center; display:block; height:95%;width:100%;}
											.gmap_canvas {overflow:hidden;background:none!important;height:95%;width:100%;}
										</style>
									</div>
								</div>
							</div>

							@endif
							<div class="form-group">
								<label class="control-label">Link Video Baru</label>
								<input type="text" name="video" class="form-control">
							</div>
							<div class="form-group">
								<label class="control-label">Sumber Video</label>
								<input type="text" name="s_video" class="form-control" value="{{ $tag->sumber_video }}">
							</div>
							<div class="form-group">
								<label class="control-label">Deskripsi<span class="text-danger">*</span></label>
								<textarea name="deskripsi" class="form-control">{{ $tag->deskripsi }}</textarea>
								@if($errors->has('deskripsi'))
								<div class="text-danger">
									{{ $errors->first('deskripsi') }}
								</div>
								@endif
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label">Gambar<span class="text-danger">*</span></label><br>
								<img src="/gambarku/{{$tag->gambar}}" id="photo" height="240"><br>
								<input type="file" name="gambar" class="hidden" accept="{{asset('/gambarku/*')}}" id="photo-input"/>
								<button type="button" onclick="document.getElementById('photo-input').click()" style="margin-top: 8px" class="btn btn-info"><i class="fa fa-folder-open" style="margin-right: 4px"></i>Browse...</button>
							</div>
							<div class="form-group">
								<label class="control-label">Sumber Gambar</label>
								<input type="text" name="s_gambar" class="form-control" value="{{ $tag->sumber_gambar }}">
							</div>
						</div>
					</div>
					<input type="hidden" name="old_video" value="{{$tag->video}}">
				</div>
				<div class="panel-footer">
					<a href="#" class="btn btn-default">Batal</a>
					<button class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
<!-- 	</div> -->
</div>
<script type="text/javascript">

   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
</script>

<script>
	let $photo = $('#photo'),
            $photoInput = $('#photo-input')
                    $photoInput.on('change', function(e) {
            let file = e.target.files[0],
                fileReader = new FileReader();

            fileReader.onload = function(e) {
                $photo.attr('src', e.target.result);
            }

            fileReader.readAsDataURL(file);
        });

</script>

@endsection