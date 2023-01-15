@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('store_produk') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nama Produk</label>
                        <input type="text" class="form-control form-control-sm" id="name" name="name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="ketegori">Kategori</label>
                        <select id="kategori" class="form-control form-control-sm" name="kategori_id">
                            @foreach($kategori as $val)
                            <option value="{{$val->id}}">{{$val->name}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="tags">tags</label>
                        <input type="text" class="form-control form-control-sm" id="tags" name="tags">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="harga">harga</label>
                        <input type="number" class="form-control form-control-sm" id="harga" name="harga">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control form-control-sm" id="deskripsi" name="deskripsi" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>


@endsection
