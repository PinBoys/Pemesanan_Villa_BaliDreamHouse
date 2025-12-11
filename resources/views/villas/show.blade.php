@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <img src="{{ asset('storage/villas/'.$villa->foto_villa) }}" class="card-img-top" alt="{{ $villa->nama_villa }}">
        <div class="card-body">
            <h3>{{ $villa->nama_villa }}</h3>
            <p>{{ $villa->deskripsi }}</p>
            <p><strong>Harga:</strong> Rp {{ number_format($villa->harga_per_malam,0,',','.') }}/malam</p>
            <p><strong>Kapasitas:</strong> {{ $villa->kapasitas }} orang</p>
            <p><strong>Status:</strong> {{ $villa->status_villa }}</p>
            <a href="{{ route('villas.pesan', $villa->id) }}" class="btn btn-success">Pesan Sekarang</a>
        </div>
    </div>
</div>
@endsection