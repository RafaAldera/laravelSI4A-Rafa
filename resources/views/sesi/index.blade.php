@extends('layout.main')
@section('title', 'sesi')
@section('content')
<!--begin::Row-->
            <div class="row">
              <div class="col-12">
                <!-- Default box -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">List Sesi</h3>
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
                  <a href = "{{ route('sesi.create')}}" class="btn btn-primary">Tambah</a>
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Waktu Sesi</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($sesi as $item)
                        <tr>
                          <td>{{ $item->nama}} </td>
                        <td>
                            <a href="{{ route('sesi.show', $item->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('sesi.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('sesi.destroy', $item->id) }}" method="POST" class="d-inline">
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