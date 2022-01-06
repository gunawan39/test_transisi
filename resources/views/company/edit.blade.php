@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Data 
                </div>

                <div class="card-body">
                
                    @foreach($company as $p)
                    <form action="update" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $p->id }}"> <br/>

                        <div class="form-group">
                                <label for="pekerjaan">Nama</label>
                                <input class="form-control" type="text" name="nama" value="{{ $p->nama }}">
                        </div>
                        <div class="form-group">
                                <label for="pekerjaan">Email</label>
                                <input class="form-control" type="text" name="email" value="{{ $p->email }}">
                        </div>
                        <div class="form-group">
                                <label for="pekerjaan">Logo</label>
                                <input class="form-control" type="text" name="logo" value="{{ $p->logo }}">
                        </div>
                        <div class="form-group">
                                <label for="pekerjaan">Website</label>
                                <input class="form-control" type="text" name="website" value="{{ $p->website }}">
                        </div>
                        <!-- Nama <input type="text" required="required" name="nama" value="{{ $p->nama }}"> <br/>
                        Email <input type="text" required="required" name="email" value="{{ $p->email }}"> <br/>
                        Website <textarea required="required" name="website">{{ $p->website }}</textarea> <br/> -->
                        <input type="submit" class="btn btn-success " value="Update">
                    </form>
                    @endforeach
                    
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
