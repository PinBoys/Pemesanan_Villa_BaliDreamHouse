@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card border-0 shadow-sm rounded">
        <div class="card-body">
            <a href="{{ route('villas.create') }}" class="btn btn-md btn-success mb-3">Tambah Villa</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama Villa</th>
                        <th>Harga per Malam</th>
                        <th>Status</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($villas as $villa)
                        <tr>
                            <td><img src="{{ asset('storage/villas/'.$villa->foto_villa) }}" width="150"></td>
                            <td>{{ $villa->nama_villa }}</td>
                            <td>{{ 'Rp '.number_format($villa->harga_per_malam,0,',','.') }}</td>
                            <td>{{ $villa->status_villa }}</td>
                            <td>
                                <a href="{{ route('villas.show', $villa->id) }}" class="btn btn-dark btn-sm">Lihat</a>
                                <a href="{{ route('villas.edit', $villa->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('villas.destroy', $villa->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center">Belum ada data villa.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection