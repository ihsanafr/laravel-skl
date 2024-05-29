@extends('layouts.template')

@section('page-title')
Detail {{$data->nama_toko}}
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
                    <h3>Detail Toko</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tr>
                            
                            <th>Nama Toko </th>
                            <td width="5%"> : </td>
                            <td width="70%">{{$data->nama_toko}}</td>
                            <td rowspan="/">
                                <img width="300" src="{{asset('storage/images/toko/'.$data->icon_toko)}}" alt="gambar">
                            </td>
                        </tr>
                        <tr>
                            <th>Nama Pemilik</th>
                            <td width="5%"> : </td>
                            <td width="70%">{{$data->user->name}}</td>
                        </tr>
                        <tr>
                            <th>Status Toko</th>
                            <td width="5%"> : </td>
                            <td width="70%">
                                @if ($data->status_aktif == TRUE)
                                    <span class="badge badge-success">Toko Aktif</span>
                                @else
                                <span class="badge badge-danger">Toko NonAktif</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td width="5%"> : </td>
                            <td width="70%">{!!$data->desc_toko!!}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td width="5%"> : </td>
                            <td width="70%">{{$data->kategori_toko}}</td>
                        </tr>
                        <tr>
                            <th>Hari Buka</th>
                            <td width="5%"> : </td>
                            <td width="70%">{{$data->hari_buka}}</td>
                        </tr>
                        <tr>
                            <th>Jam Buka</th>
                            <td width="5%"> : </td>
                            <td width="70%">{{$data->jam_buka}}</td>
                        </tr>
                        <tr>
                            <th>Jam Libur</th>
                            <td width="5%"> : </td>
                            <td width="70%">{{$data->jam_libur}}</td>
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
                <form action="{{route('toko.update',$data->id)}}" method="post">
                    @csrf
                    {{method_field('PUT')}}

                    <div class="modal-body">
                        <form-group>
                            <label>Nama Toko</label>
                            <input type="text" name="nama_toko" value="{{ $data->nama_toko }}" required class="form-control"> 
                        </form-group>

                        

                        <div class="row justify-content-arround">
                            <div class="form-group col-md-6">
                                <label>Jam Buka</label>
                                <input value="{{$data->jam_buka}}" type="time" class="form-control" name="jam_buka">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Jam Tutup</label>
                                <input value="{{$data->jam_libur}}" type="time" class="form-control" name="jam_libur">
                            </div>
                        </div>

                        <div class="form_group">
                            <label for="">Status Toko</label>
                            <select name="status_aktif" class="form-control" required>
                                <option value="0">Non-Aktif</option>
                                <option value="1">Aktif</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" name="kategori_toko">
                                <option value="elektronik">elektronik</option>
                                <option value="otomotif">otomotif</option>
                                <option value="sembako">sembako</option>
                                <option value="fashion">fashion</option>
                                <option value="makanan">makanan</option>
                                <option value="obat">obat</option>
                                <option value="aksesoris">aksesoris</option>
                                <option value="perabotan">perabotan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="hari_buka">Hari Buka</label>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="senin" name="hari_buka[]" value="senin" {{ in_array('senin', explode(',', $data->hari_buka))? 'checked' : '' }}>
                                <label for="senin" class="custom-control-label">Senin</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="selasa" name="hari_buka[]" value="selasa" {{ in_array('selasa', explode(',', $data->hari_buka))? 'checked' : '' }}>
                                <label for="selasa" class="custom-control-label">Selasa</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="rabu" name="hari_buka[]" value="rabu" {{ in_array('rabu', explode(',', $data->hari_buka))? 'checked' : '' }}>
                                <label for="rabu" class="custom-control-label">Rabu</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="kamis" name="hari_buka[]" value="kamis" {{ in_array('kamis', explode(',', $data->hari_buka))? 'checked' : '' }}>
                                <label for="kamis" class="custom-control-label">Kamis</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="jumat" name="hari_buka[]" value="jumat" {{ in_array('jumat', explode(',', $data->hari_buka))? 'checked' : '' }}>
                                <label for="jumat" class="custom-control-label">Jumat</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sabtu" name="hari_buka[]" value="sabtu" {{ in_array('sabtu', explode(',', $data->hari_buka))? 'checked' : '' }}>
                                <label for="sabtu" class="custom-control-label">Sabtu</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="minggu" name="hari_buka[]" value="minggu" {{ in_array('minggu', explode(',', $data->hari_buka))? 'checked' : '' }}>
                                <label for="minggu" class="custom-control-label">Minggu</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="icon_toko">Icon Toko</label>
                            <input type="file" class="form-control" required id="icon_toko" name="icon_toko">
                            
                        </div>


                        <div class="form-group">
                            <label>Deskripsi Toko</label>
                            <textarea value="" name="desc_toko" id="ck">{!!$data->desc_toko!!}</textarea>
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
