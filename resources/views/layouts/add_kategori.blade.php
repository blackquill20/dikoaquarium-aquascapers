@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>Tambah Kategori</h4>
                    <form action="{{ route('store_kategori') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" name="name"
                                    class="form-control form-control-sm @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}">
                            </div>
                        </div>
                        <button type="submit" id='save' class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h4>List Kategori</h4>
                    <div class="form-group">
                        <select id="inputState" class="form-control form-control-sm">
                            @foreach($kategori as $val)
                            <option value="{{$val->id}}">{{$val->name}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
   
            $('#save').submit(function () {
            console.log('tes');
            // Swal.fire({
            //     title: 'Auto close alert!',
            //     html: 'I will close in <b></b> milliseconds.',
            //     timerProgressBar: true,
            // })
            }); 
</script>

@endsection
