@extends('layouts.template')

@section('page-title')
Dashboard
@endsection

@section('content')
{{-- untuk menampilkan konten halaman sesuai dengan frame di template --}}

@if (Auth::user()->level === 'admin')

<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>


@else
{{-- Kondisi jika profile belum diisi --}}
@if (!$data_profile)
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-ban"></i>Hallo {{Auth::user()->name}}</h5>
    <p>Anda belum melengkapi profile, silahkan lengkapi profile, klik tombol dibawah</p>
    <p>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-profile-xl">
            Tambah data
        </button>
    </p>
</div>

@if ($errors->any())
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-ban"></i>Sorry, there is invalid input</h5>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{{-- modal Profile --}}
<div class="modal fade" id="modal-profile-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah data User (Penjual)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('biodata.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nomor Handphone</label>
                        <input type="number" name="nomor_hp" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" required class="form-control">
                        <input type="text" name="id_user" hidden value="{{Auth::user()->id}}">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" required class="form-control">
                            <option value="laki-laki">Laki - Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Poto Profile</label>
                        <input type="file" required name="foto_profile" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" required class="form-control" cols="10" rows="3"> </textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


@else
{{-- Jika user sudah melengkapi data, maka akan memunculkan berikut --}}

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Hallo, {{Auth::user()->name}}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <h6>Informasi Akun</h6>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                @foreach ($data_profile as $item)
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <td>{{$item->user->name}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{$item->user->email}}</td>
                                </tr>
                                <tr>
                                    <th>Level</th>
                                    <td>{{$item->user->level}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h6>Detail Biodata</h6>
                        <div class="table-responsive">
                            <table class="table table-responsive">
                                @foreach ($data_profile as $item)
                                <tr>
                                    <th>Nomor HP</th>
                                    <td>{{$item->nomor_hp}}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td>{{$item->tgl_lahir}}</td>
                                </tr>
                                <tr>
                                    <th>Jneis Kelamin</th>
                                    <td>{{$item->jenis_kelamin}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@endif

@endsection
