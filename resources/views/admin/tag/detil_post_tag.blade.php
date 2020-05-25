@extends('admin/layouts.app',['data' => $data])

@section('konten')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="modal fade" id="detail-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah <span class="add-item-label"></span></h4>
            </div>
            <form class="form" action="#" method="POST">
                <input type="hidden" name="type" />
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label"><span class="add-item-label"></span></label>
                        <select name="detail" class="form-control" required></select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
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
	</div>
</div>
<hr>
<div class="panel-group" id="accordion">
	@foreach($drop_d as $drop)
	<div class="panel panel-primary">
		<div class="panel-heading" role="tab" id="headingFive">
			<a style="text-decoration: none; color: #232323;" class="collapsed drop" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$drop->id_tag}}" aria-expanded="true" aria-controls="collapseFive" data-idt="{{$drop->id_tag}}" data-idp="{{Request::segment(3)}}">
				{{$drop->nama_tag}}
			</a>
		</div>
		<div id="collapse{{$drop->id_tag}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFive">
			<div class="panel-body">
				<div class="row isi{{$drop->id_tag}}">
					<!-- Katanya Pake Foreach lagi -->
					<div class="col-lg-2">
					@if (!empty($drop->det_pos))
						@foreach ($drop->det_pos as $item)
						@if ($drop->id_tag == $item->id_tag)
						<div class="col-4 mb-3">
							<div class="card">
								<img src="/gambarku/{{$item->gambar}}" alt="" width="100%">
								<div class="card-body">
									{{$item->nama_post}}
									{{-- {{$item->nama_tag}}
									{{$item->id_post}} --}}
								</div>
							</div>
						</div>
							@endif
						@endforeach
					@else
						{{-- tidak ada data --}}
					@endif
					</div>
					<!-- Katanya Pake EndForeach lagi -->
					<div class="col-lg-2">
						<a class="card" data-toggle="modal" href="#detail-modal" data-type="detil_post"><i class="fa fa-plus fa-4x"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>
<script src="{{asset('/assets/select2/select2.min.js')}}"></script>
<style>
	.prosesi-title {
		white-space: nowrap;
        overflow: hidden;
        display: block;
        text-overflow: ellipsis;
	}

</style>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
	$(document).ready(function(){
		$('.drop').click(function(){
			var id_tag=$(this).data('idt');
			var id_post=$(this).data('idp');
			var values = [];
			values.push(id_tag);
			values.push(id_post);
			
			var join_val= values.join(",");
			console.log(join_val);
			// alert(id_post);
			$.ajax({
				url:'/tag/drop_down_t/'+join_val,
				type:'GET',
				dataType:'json',
			    success:function(response)
			    {
			    	var len = 0;
			    	$(".isi$drop->['id_tag']").empty();
			    	if (response != null) {
			    		len = response.length;
			    	}
			    	if (len>0) {
			    		for(var i=0; i<len; i++){
				    		id_tag = response[i].id_tag;
			                nama_tag = response[i].nama_tag;
			                nama_post = response[i].nama_post;
			                gambar = response[i].gambar;
			                id_post = response[i].id_post;
			                id_parent_post = response[i].id_parent_post;

			                var data_tag = '<div class="panel panel-default" style="border: 1px solid #efeef4">'+
											'<img src="/#" width="10%" />'+
											'<div class="card-body">'+
												nama_post+
											'</div>'+
											'<a data-id="#" class="btn btn-delete btn-sm btn-danger btn-card">'+
												'Delete'+
											'</a>'+
										'</div>'

							$(".isi$drop->['id_tag']").append(data_tag);
				    	}
			    	}
			    	
			    },
			    error: function(response) {
			    	console.log(response);
			    }
   			});
		});
	});
</script>
@endsection