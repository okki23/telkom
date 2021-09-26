@extends('template.main')

@section('contain')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card mt-3 mx-3">
                <div class="card-header">
                    <div class="button-export mt-4">
                        <h1>DISCONNECT</h1>
                        {{-- <a href="{{ route('database.create') }}" class="btn btn-primary mb-3">Tambah Data</a> --}}
                        {{-- <a href="{{ route('database.export') }}" class="btn btn-success mb-3">Export Excel</a>
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal"
                            data-target="#exampleModal">
                            Import Excel
                        </button> --}}

                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-hover" id="table_id">
                        <thead>
                            <tr>
                                <th scope="col">WFM ID</th>
                                <th scope="col">ORDER</th>
                                <th scope="col">CUSTOMER</th>
                                <th scope="col">LOKASI</th>
                                <th scope="col">KOTA</th>
                                <th scope="col">JENIS ONT</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">PLAN CABUT</th>
                                <th scope="col">PIC</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($disconnects as $item)
                            <tr>
                                <td>{{ $item->wfm_id; }}</td>
                                <td>{{ $item->older }}</td>
                                <td>{{ $item->customer }}</td>
                                <td>{{ $item->lokasi }}</td>
                                <td>{{ $item->kota }}</td>
                                <td>{{ $item->jenis_ont }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->plan_cabut }}</td>
                                <td>{{ $item->pic }}</td>
                                <td>
                                    <a href="{{ route('dis.edit', $item->id) }}" class="btn btn-success">Edit</a> |
                                    <form action="{{ route('dis.destroy',$item->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Yakin data akan dihapus ?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('database.import')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Pilih file</label>
                                <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1"
                                    required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary">Import</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
