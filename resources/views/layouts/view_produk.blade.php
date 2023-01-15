@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table id="table_id" class="display table table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Tags</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $a)
                            <tr>
                                <td>{{ $a->Namalengkap }}</td>
                                <td>{{ $a->harga }}</td>
                                <td>{{ $a->tags }}</td>
                                <td>{{ $a->kategori_id }}</td>
                                <td>{{ $a->deskripsi }}</td>
                                <td>Row 1 Data 2</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
