@extends('pengguna/layouts.app')

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
<div class="container py-5">
    <div class="row">
        <div class="col-3">
            @if ($kategori_post->gambar != '')
                <img src="/gambarku/{{$kategori_post->gambar}}" alt="..." class="card-img-top">
            @else
                <img src="/assets/images/placeholder.png" alt="..." class="card-img-top">
            @endif
        </div>
        <div class="col-9">
            <h1 class="mb-3">{{$kategori_post->nama_post}}</h1>
            <table width="100%" class="mb-3">
                <tr>
                    <td width="100"><strong>Jenis</strong></td>
                    <td>{{$kategori_post->nama_kategori}}</td>
                </tr>
            </table>
            <p>{!!$kategori_post->deskripsi!!}</p>
            <div class="container_youtube">
                <iframe width="640" height="360" src="https://www.youtube.com/embed/{{ $kategori_post->video }}" class="video" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-lg-4">
        <!-- If count data ada atau tidak -->
        @foreach ($prosesi_all as $pr_al)
            <h4 class="mb-3">{{$pr_al->nama_status}}</h4>
            @if (!empty($pr_al->det_prosesi))
                @foreach ($pr_al->det_prosesi as $item)
                    @if ($pr_al->id_status == $item->id_status)
                        <ul class="timeline mb-5">
                            <li>
                                <a href="#/{{$item->id_post}}/{{$item->id_parent_post}}">{{$item->nama_post}}</a>
                            </li>
                        </ul>
                    @endif
                @endforeach
            @else
                <div class="text-muted mb-5">
                    <em>Tidak ada prosesi.</em>
                </div>
            @endif
            <!-- Else count kosong -->
        @endforeach
        </div>
    </div>
    <hr>
    <div class="row">
        @foreach ($kategori_all as $kt_al)
        <div class="col-lg-4">
            <h3>{{$kt_al->nama_tag}}</h3>
            @if (!empty($kt_al->det_kategori))
            <div class="row" style="margin-bottom: 16px">
                @foreach ($kt_al->det_kategori as $item)
                    @if ($kt_al->id_tag == $item->id_tag)
                    <div class="col-lg-4" style="margin-top: 16px">
                        <div class="cardmix" style="background-image: url(/gambarku/{{$item->gambar}})">
                            <div class="cardmix-body">
                                {{$item->nama_post}}
                                {{-- {{$item->id_post}}
                                {{$item->id_parent_post}} --}}
                            </div>
                            <a href="/tag_pengguna/detil/{{$item->id_parent_post}}/{{$item->id_tag}}" class="btn btn-primary btn-sm btn-primer btn-cardmix">Lihat</a>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
            @endif
        </div>
        @endforeach
    </div>
</div>
<script src="{{asset('/assets/select2/select2.min.js')}}"></script>


@endsection