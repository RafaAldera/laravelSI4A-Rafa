@extends('layout.main')
@section('title','matakuliah')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>List MataKuliah</b></h3>
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
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Tahun Akademik</th>
                        <td>{{ $matakuliah->tahun_akademik }}</td>
                    </tr>
                    <tr>
                        <th>Semester</th>
                        <td>{{ $matakuliah->kode_smt }}</td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td>{{ $matakuliah->kelas }}</td>
                    </tr>
                    <tr>
                        <th>Sesi</th>
                        <td>{{ $matakuliah->sesi->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Mata Kuliah</th>
                        <td>{{ $matakuliah->matakuliah->nama ?? '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
<!--end::Row-->
@endsection