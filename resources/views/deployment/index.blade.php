@extends('template.main')

@section('contain')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card mt-3 mx-3">
                <div class="card-header">
                    <div class="button-export mt-4">
                        <h1>Deployment</h1>
                        <a href="{{ route('dep.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
                        <a href="{{ route('database.export') }}" class="btn btn-success mb-3">Export Excel</a>
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal"
                            data-target="#exampleModal">
                            Import Excel
                        </button>

                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-hover" id="table_id">
                        <thead>
                            <tr>
                                <th scope="col">REKAP ID</th>
                                <th scope="col">AO</th>
                                <th scope="col">TANGGAL</th>
                                <th scope="col">OLO</th>
                                <th scope="col">WITEL</th>
                                <th scope="col">PRODUK</th>
                                <th scope="col">STATUS NCX</th>
                                <th scope="col">STATUS WFM</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($deps as $item)
                            <tr>
                                <td>{{ $item->rekap_id; }}</td>
                                <td>{{ $item->ao }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->olo }}</td>
                                <td>{{ $item->witel }}</td>
                                <td>{{ $item->produk }}</td>
                                <td>{{ $item->status_ncx }}</td>
                                <td>{{ $item->status_wfm }}</td>
                                <td>
                                    <a href="{{ route('dep.edit', $item->id) }}" class="btn btn-success">Edit</a> |
                                    <form action="{{ route('dep.destroy',$item->id) }}" method="POST"
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
