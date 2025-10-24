@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Form Pembayaran</h3>
    <form action="{{ route('pembayarans.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="pemesanan_id" value="{{ $pemesanan->id }}">
        
        <div class="mb-3">
            <label>Metode Pembayaran</label>
            <select name="metode_pembayaran" class="form-control" required>
                <option value="transfer bank">Transfer Bank</option>
                <option value="e-wallet">E-Wallet</option>
                <option value="kartu kredit">Kartu Kredit</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Jumlah Bayar (Rp)</label>
            <input type="number" name="jumlah_bayar" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Upload Bukti Bayar</label>
            <input type="file" name="bukti_bayar" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Kirim Pembayaran</button>
    </form>
</div>
@endsection