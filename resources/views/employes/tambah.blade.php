@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Employees
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
                                <label for="nama">Nama</label>
                                <input class="form-control" type="text" name="nama" value="{{ old('nama') }}">
                        </div>
                        <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="text" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="company">Company</label>
                            <select class="form-control" name="company" id="company">
                                @foreach ($companies as $p)
                                    <option value="{{ $p->id }}"> {{ $p->nama }}</option>
                                @endforeach

                            </select>
                        </div>
                        <input type="submit" class="btn btn-success " value="Simpan Data">
                    </form>
                    
                </div>


            </div>
        </div>
    </div>
</div>

@endsection
