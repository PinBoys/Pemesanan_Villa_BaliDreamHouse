@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Form Pemesanan</h3>
    <form action="{{ route('pemesanans.store') }}" method="POST">
        @csrf
        <input type="hidden" name="villa_id" value="{{ $villa->id }}">
        
        <div class="mb-3">
            <label>Nama Pemesan</label>
            <input type="text" name="nama_pemesan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Check-in</label>
            <input type="date" name="tanggal_checkin" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Check-out</label>
            <input type="date" name="tanggal_checkout" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jumlah Tamu</label>
            <input type="number" name="jumlah_tamu" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Lanjut ke Pembayaran</button>
    </form>
</div>
@endsection