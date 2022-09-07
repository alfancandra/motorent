@extends('partials.template')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Data Motor</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Motor</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Add Row</h4>
                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Add Row
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Modal tambah data -->
                    <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header no-bd">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold">
                                        New</span> 
                                        <span class="fw-light">
                                            Row
                                        </span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="small">Create a new row using this form, make sure you fill them all</p>
                                    <form action="{{ route('login.sewa.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Nama Lengkap</label>
                                                    <input id="addName" type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group form-group-default">
                                                    <label>Hp</label>
                                                    <input id="addPosition" type="number" name="hp" class="form-control" placeholder="Nomor Hp">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Alamat</label>
                                                    <input id="addOffice" type="text" name="alamat" class="form-control" placeholder="Alamat">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Motor</label>
                                                    <select class="form-control form-control" name="id_motor" id="defaultSelect">
                                                        @foreach($motor as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Tanggal Mulai</label>
                                                    <input id="addName" name="tanggal_mulai" type="date" class="form-control" placeholder="Tanggal Mulai">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Tanggal Selesai</label>
                                                    <input id="addName" name="tanggal_selesai" type="date" class="form-control" placeholder="Tanggal Selesai">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Jaminan</label>
                                                    <select class="form-control form-control" name="jaminan" id="defaultSelect">
                                                        <option value="KTP">KTP</option>
                                                        <option value="KK">KK</option>
                                                        <option value="NPWP">NPWP</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer no-bd">
                                            <button type="submit" class="btn btn-primary">Add</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <!-- Modal edit data -->
                    @if($edit ?? false)
                    <div class="modal fade" id="editRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header no-bd">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold">
                                        New</span> 
                                        <span class="fw-light">
                                            Row
                                        </span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="small">Create a new row using this form, make sure you fill them all</p>
                                    <form action="{{ route('login.sewa.update',$find->id) }}" method="post">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Nama Lengkap</label>
                                                    <input id="addName" type="text" name="nama_lengkap" value="{{ $find->nama_lengkap }}" class="form-control" placeholder="Nama Lengkap">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group form-group-default">
                                                    <label>Hp</label>
                                                    <input id="addPosition" type="number" name="hp" value="{{ $find->hp }}" class="form-control" placeholder="Nomor Hp">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Alamat</label>
                                                    <input id="addOffice" type="text" name="alamat" value="{{ $find->alamat }}" class="form-control" placeholder="Alamat">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Motor</label>
                                                    <select class="form-control form-control" name="id_motor" id="defaultSelect">
                                                        @foreach($motor as $item)
                                                        <option value="{{ $item->id }}" {{ $find->id_motor == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Tanggal Mulai</label>
                                                    <input id="addName" name="tanggal_mulai" value="{{ $find->tanggal_mulai }}" type="date" class="form-control" placeholder="Tanggal Mulai">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Tanggal Selesai</label>
                                                    <input id="addName" name="tanggal_selesai" value="{{ $find->tanggal_selesai }}" type="date" class="form-control" placeholder="Tanggal Selesai">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Jaminan</label>
                                                    <select class="form-control form-control" name="jaminan" id="defaultSelect">
                                                        <option {{ $find->jaminan == 'KTP' ? 'selected' : '' }} value="KTP">KTP</option>
                                                        <option {{ $find->jaminan == 'KK' ? 'selected' : '' }} value="KK">KK</option>
                                                        <option {{ $find->jaminan == 'NPWP' ? 'selected' : '' }} value="NPWP">NPWP</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer no-bd">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th style="width: 2% !important">No</th>
                                    <th>Nama</th>
                                    <th>Hp</th>
                                    <th>Motor</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th style="width: 2% !important">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php 
                                $no = 1;
                                @endphp
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item['nama_lengkap'] }}</td>
                                    <td>{{ $item['hp'] }}</td>
                                    <td>{{ $item['motor']['nama'] }}</td>
                                    <td>{{ $item['tanggal_mulai'] }}</td>
                                    <td>{{ $item['tanggal_selesai'] }}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{ route('login.sewa.edit',$item['id']) }}" class="btn btn-link btn-primary btn-md" data-original-title="Edit Task">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('login.sewa.destroy',$item['id']) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                            <button type="submit" onclick="return confirm('Apakah anda yakin?')" class="btn btn-link btn-danger" data-original-title="Remove">
                                                <i class="fa fa-times"></i>
                                            </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
    <script>
        $('#editRowModal').modal('show');
    </script>
@endpush