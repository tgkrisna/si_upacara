@extends('pengguna/layouts.app')

@section('konten')
<div class="container py-5">
    <h1 class="text-center mb-5 text-white">E-Upacara</h1>
    <form action="#" class="form mb-5">
        <div class="input-group">
            <input class="form-control" placeholder="Cari..." name="cari">
            <span class="input-group-append">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-search">Cari</i>
                </button>
            </span>
        </div>
    </form>
    <div class="swiper-container" id="swiper-menu">
        <div class="swiper-wrapper">
            @foreach($data['kategori'] as $kat)
            <div class="swiper-slide">
                <div class="card card-upacara gradient-1 text-center">
                    <div class="card-body">
                        <h1 class="card-title my-5">
                            <a href="#" class="stretched-link">
                                {{$kat->nama_kategori}}
                            </a>
                        </h1>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<script src="{{asset('/assets/swiper/dist/js/swiper.js')}}">
var mySwiper = new Swiper('#swiper-menu', {
    speed: 400,
    spaceBetween: 100,
    effect: 'slide',
    slidesPerView: 'auto'
});
    var mySwiper = document.querySelector('#swiper-menu').swiper

    mySwiper.slideNext();
</script>
@endsection