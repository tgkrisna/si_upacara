@extends('pengguna/layouts.app')

@section('konten')
<h1 class="text-center mb-5">Nama Tag</h1>
@if (!empty($tag))
    @foreach ($tag as $t)
        <div class="card shadow rounded-lg mb-5">
            <div class="card-body">
            <h4><a href="#" class="card-link stretched-link"></a>{{$t->nama_post}}</h4>
                <p>
                    {!! substr($t['deskripsi'],0,10) !!}...
                </p>
            </div>
        </div>
    @endforeach
@else
<div class="text-center">
    <img src="#" alt="" width="480">
    <h5 class="my-5 text-muted">
        Tidak Ada Data
    </h5>
</div>
@endif
<div class="text-center">
    {{$tag->links()}}
</div>
