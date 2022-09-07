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
                        <!-- Button Tambah Data -->
                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Add Row
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <!-- Message Session Error -->
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <!-- Message Session Success -->
                    @if ($message = Session::get('success'))
                        <div id="alert" class="alert alert-success alert-block mb-3">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ $message }}
                        </div>
                    @endif

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
                                    <form action="{{ route('login.motor.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Nama Motor</label>
                                                    <input id="addName" type="text" name="nama" class="form-control" placeholder="Nama Motor">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group form-group-default">
                                                    <label>Stok</label>
                                                    <input id="addPosition" type="number" name="stok" class="form-control" placeholder="Stok motor">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Harga</label>
                                                    <input id="addOffice" type="number" name="harga" class="form-control" placeholder="Harga sewa">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Jenis</label>
                                                    <input id="addName" type="text" name="jenis" class="form-control" placeholder="Jenis">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Foto</label>
                                                    <input id="addName" name="img" type="file" class="form-control" placeholder="Foto">
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
                    <div class="modal fade show" id="editRowModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <form action="{{ route('login.motor.update',$find->id) }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Nama Motor</label>
                                                    <input id="addName" type="text" name="nama" value="{{ $find->nama }}" class="form-control" placeholder="Nama Motor">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group form-group-default">
                                                    <label>Stok</label>
                                                    <input id="addPosition" type="number" name="stok" value="{{ $find->stok }}" class="form-control" placeholder="Stok motor">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Harga</label>
                                                    <input id="addOffice" type="number" name="harga" value="{{ $find->harga }}" class="form-control" placeholder="Harga sewa">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Jenis</label>
                                                    <input id="addName" type="text" name="jenis" value="{{ $find->jenis }}" class="form-control" placeholder="Jenis">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Foto</label>
                                                    <input id="addName" name="img" type="file" class="form-control" placeholder="Foto">
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
                                    <th>Nama</th>
                                    <th>Jenis</th>
                                    <th>Harga</th>
                                    <th>Foto</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item['nama'] }}</td>
                                    <td>{{ $item['jenis'] }}</td>
                                    <td>{{ $item['harga'] }}</td>
                                    <td><img width="100" src="{{ asset('images/'.$item['img']) }}"></td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{ route('login.motor.edit',$item['id']) }}" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('login.motor.destroy',$item['id']) }}" method="post">
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