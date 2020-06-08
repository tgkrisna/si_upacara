@extends('pengguna/layouts.app')

@section('konten')
<div class="container py-5">
    <h1 class="text-center mb-5 text-white">E-Upacara</h1>
    <form action="#" class="form mb-5">
        <div class="input-grup">
            <input class="form-control" placeholder="Cari..." name="cari">
            <span class="input-group-append">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-search">Cari</i>
                </button>
            </span>
        </div>
    </form>
    <div class="swiper-container">
        @foreach($data['kategori'] as $kat)
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                {{$kat->nama_kategori}}
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection