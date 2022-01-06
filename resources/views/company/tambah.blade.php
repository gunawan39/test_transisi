@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data 
                </div>

                <div class="card-body">
             
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                
                    <form action="store" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                                <label for="pekerjaan">Nama</label>
                                <input class="form-control" type="text" name="nama" value="{{ old('nama') }}">
                        </div>
                        <div class="form-group">
                                <label for="pekerjaan">Email</label>
                                <input class="form-control" type="text" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                                <label for="pekerjaan">Logo</label>
                                <input class="form-control" type="text" name="logo" value="{{ old('logo') }}">
                        </div>
                        <div class="form-group">
                                <label for="pekerjaan">Website</label>
                                <input class="form-control" type="text" name="website" value="{{ old('website') }}">
                        </div>
                        <input type="submit" class="btn btn-success " value="Simpan Data">
                    </form>
                    
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
