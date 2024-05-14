@extends('layouts.template')

@section('page-title')
Detail {{$user->name}}
@endsection



@section('content')

@if ($errors->any())
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-ban"></i>Sorry Error</h5>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>  
@endif
{{-- area detail pemilik toko --}}
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3>Detail user</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tr>
                            <th>Nama User (Pemilik Toko)</th>
                            <td width="5%"> : </td>
                            <td width="70%">{{$user->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td width="5%"> : </td>
                            <td width="70%">{{$user->email}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        
        {{-- Card Edit --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Data</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{route('penjual.update',$user->id)}}" method="post">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label>Nama lengkap penjual</label>
                        <input type="text" name="name" value="{{$user->name}}" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email penjual</label>
                        <input type="email" name="email" value="{{$user->email}}" required class="form-control">
                        <input type="text" name="level" hidden value="penjual">
                    </div>
                    <div class="form-group">
                        <label>Kata sandi</label>
                        <input type="password" name="password" class="form-control" placeholder="Minimal 8 character...">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
