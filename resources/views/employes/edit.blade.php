@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Data Employees
                </div>

                <div class="card-body">
                
                    @foreach($employes as $p)
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
                            <label for="company">Company</label>
                            <select class="form-control" name="company" id="company">
                                @foreach ($companies as $c)
                                    <option value="{{ $c->id }}"> {{ $c->nama }}</option>
                                @endforeach

                            </select>
                        </div>
                        <input type="submit" class="btn btn-success " value="Update">
                    </form>
                    @endforeach
                    
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
