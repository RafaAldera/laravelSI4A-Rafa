@extends('layout.main')
@section('title', 'matakuliah')
@section('content')
<!--begin::Row-->
            <div class="row">
              <div class="col-12">
                <!-- Default box -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">List Matakuliah</h3>
                    <div class="card-tools">
                      <button
                        type="button"
                        class="btn btn-tool"
                        data-lte-toggle="card-collapse"
                        title="Collapse"
                      >
                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                      </button>
                      <button
                        type="button"
                        class="btn btn-tool"
                        data-lte-toggle="card-remove"
                        title="Remove"
                      >
                        <i class="bi bi-x-lg"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                  <a href = "{{ route('matakuliah.create')}}" class="btn btn-primary">Tambah</a>
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Mata Kuliah</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($matakuliah as $item)
                        <tr>
                          <td>{{ $item->nama}} </td>
                        <td>
                            <a href="{{ route('matakuliah.show', $item->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('matakuliah.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('matakuliah.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger show_confirm" 
                                data-toggle="tooltip" title='Delete'>Delete</button>

                            </form>
                        </td>
                        </tr>

                        @endforeach
                    </table>

</div>
                  <!-- /.card-body -->
                  {{-- <div class="card-footer">Footer</div> --}}
                  <!-- /.card-footer-->
                </div>
                <!-- /.card -->
              </div>
            </div>
            <!--end::Row-->
    @endsection